<script src="jquery.min.js"></script>

    <script src="dist/trumbowyg.min.js"></script>

    <script type="text/javascript" src="dist/langs/pt_br.min.js"></script>

    <script src="dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

    <script>
        $('#trumbowyg-editor').trumbowyg({
            lang: 'pt_br',
            btns: [
                // ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                // ['link'],
                // ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                // ['fullscreen'],
                // ['emoji']
            ],
            autogrow: true
        });
    </script>