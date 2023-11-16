<?php
    session_start();
    require_once "../conexao-bd.php";
    if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    }
    $email = $_SESSION['email'];
    $selecinarUserLogado = $conn->prepare("SELECT * FROM logado WHERE email = :email");
    $selecinarUserLogado->bindValue(':email', $email);
    $selecinarUserLogado->execute();
    $row = $selecinarUserLogado->fetch(PDO::FETCH_ASSOC);
    require_once "../controllers/controllers_pedidos_dos_clientes.php";

    if(isset($_POST['btn_validar_pedido'])):

        $data_final = addslashes($_POST['data_final']) ;
        $id_gestao_pedido = addslashes($_POST['id_atualizar']);
        $status = addslashes($_POST['status']);
        $produto_servico = addslashes($_POST['produto_servico']);
        $quantidade_produto_servico = addslashes($_POST['quantidade_produto_servico']);
        $nome_responsavel = addslashes($row['nome']);   
        
        if(empty($produto_servico))
        {
            header('Location: dashboard.php?produto_vazio');
            die();
        }elseif(!empty($produto_servico and $quantidade_produto_servico))
        {            
            //Começa AQui        
            require_once "../config.php";
            try
            {
                $conn = new PDO("mysql:host=$DBHOST;dbname=" . $DBNAME, $DBUSER, $DBPASS);
            }
            catch(PDOException $error)
            {
                die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado: " . $error->getMessage());
            }

            //Travessas
            $result_travessas = $conn->prepare("SELECT descricao FROM travessas ORDER BY id DESC");
            $result_travessas->execute();
            $row_travessa = $result_travessas->fetchAll(PDO::FETCH_ASSOC);

            //Converter array multidimensional/bidimensional em unidimensional
            $merged_travessas = array();
            $keys = array();
            foreach($row_travessa as $key => $arr) {
                $innerKey = array_keys($arr)[0];
                if(!isset($keys[$innerKey])) {
                    $keys[$innerKey] = 0;
                }
                else {
                    $keys[$innerKey] += 1;
                }
                $prefix = $keys[$innerKey];
                $merged_travessas[$prefix. '_' .$innerKey] = $arr[$innerKey];
            }
            //Last Converter array multidimensional/bidimensional em unidimensional
            // echo '<pre>', print_r($merged_travessas), '</pre>';

            if(in_array($produto_servico, $merged_travessas))
            {
                //Atualizar Stock
                $qtd_travessas = $conn->prepare("SELECT quantidade_stock FROM travessas WHERE descricao = ?");
                $qtd_travessas->bindParam(1, $produto_servico);
                $qtd_travessas->execute();
                $row_qtd = $qtd_travessas->fetch(PDO::FETCH_ASSOC);
                if($quantidade_produto_servico > $row_qtd['quantidade_stock'])
                {
                    header('Location: dashboard.php?stock_baixo');
                    exit;
                }else 
                {
                    $qtd_atualizada = $row_qtd['quantidade_stock'] - $quantidade_produto_servico; 

                    //Atualizar Stock da tbl Travessas
                    $atualizar_estoque_travessas = $conn->prepare("UPDATE travessas SET quantidade_stock = ? WHERE descricao = ?");
                    $atualizar_estoque_travessas->bindParam(1, $qtd_atualizada);
                    $atualizar_estoque_travessas->bindParam(2, $produto_servico);
                    $qtd_stock_atualizado = $atualizar_estoque_travessas->execute();

                    if($qtd_stock_atualizado)
                    {
                        //Atualizar pedidos dos clientes
                        $gestao_pedido = new controllers_pedidos_dos_clientes();
                        $atualizar = $gestao_pedido->atualizar_pedidos_dos_clientes($data_final, $status, $nome_responsavel, $id_gestao_pedido);
                        if($atualizar)
                        {
                            header('Location: dashboard.php?atualizado');
                        }
                        else 
                        {
                            header('Location: dashboard.php?nao-atualizado');
                        }
                    }
                }//Last Travessas


            }else{
                echo "N $produto_servico";
                // //puxadores
                // $result_puxadores = $conn->prepare("SELECT descricao FROM puxadores ORDER BY id DESC");
                // $result_puxadores->execute();
                // $row_travessa = $result_puxadores->fetchAll(PDO::FETCH_ASSOC);

                // //Converter array multidimensional/bidimensional em unidimensional
                // $merged_puxadores = array();
                // $keys = array();
                // foreach($row_travessa as $key => $arr) {
                //     $innerKey = array_keys($arr)[0];
                //     if(!isset($keys[$innerKey])) {
                //         $keys[$innerKey] = 0;
                //     }
                //     else {
                //         $keys[$innerKey] += 1;
                //     }
                //     $prefix = $keys[$innerKey];
                //     $merged_puxadores[$prefix. '_' .$innerKey] = $arr[$innerKey];
                // }
                // //Last Converter array multidimensional/bidimensional em unidimensional
                // // echo '<pre>', print_r($merged_puxadores), '</pre>';

                // if(in_array($produto_servico, $merged_puxadores))
                // {
                //     //Atualizar Stock
                //     $qtd_puxadores = $conn->prepare("SELECT quantidade_stock FROM puxadores WHERE descricao = ?");
                //     $qtd_puxadores->bindParam(1, $produto_servico);
                //     $qtd_puxadores->execute();
                //     $row_qtd = $qtd_puxadores->fetch(PDO::FETCH_ASSOC);
                //     if($quantidade_produto_servico > $row_qtd['quantidade_stock'])
                //     {
                //         header('Location: dashboard.php?stock_baixo');
                //         exit;
                //     }else 
                //     {
                //         $qtd_atualizada = $row_qtd['quantidade_stock'] - $quantidade_produto_servico; 

                //         //Atualizar Stock da tbl puxadores
                //         $atualizar_estoque_puxadores = $conn->prepare("UPDATE puxadores SET quantidade_stock = ? WHERE descricao = ?");
                //         $atualizar_estoque_puxadores->bindParam(1, $qtd_atualizada);
                //         $atualizar_estoque_puxadores->bindParam(2, $produto_servico);
                //         $qtd_stock_atualizado = $atualizar_estoque_puxadores->execute();

                //         if($qtd_stock_atualizado)
                //         {
                //             //Atualizar pedidos dos clientes
                //             $gestao_pedido = new controllers_pedidos_dos_clientes();
                //             $atualizar = $gestao_pedido->atualizar_pedidos_dos_clientes($data_final, $status, $nome_responsavel, $id_gestao_pedido);
                //             if($atualizar)
                //             {
                //                 header('Location: dashboard.php?atualizado');
                //             }
                //             else 
                //             {
                //                 header('Location: dashboard.php?nao-atualizado');
                //             }
                //         }
                //     }

                // }
                //Last Puxadores

            }
        } else {
            header('Location: dashboard.php?campos_vasio');
        }
    endif;