tinymce.init({
    selector: "textarea[class=tinymce]",
    editor_deselector : "mceNoEditor",
    relative_urls : false,
    remove_script_host : false,
    language:"ru",
    plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste moxiemanager"
    ],
    fontsize_formats: "8px 9px 10px 11px 12px 26px 36px",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | undo redo pastetext | styleselect | fontselect | fontsizeselect"
    });
