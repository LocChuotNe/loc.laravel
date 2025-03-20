(function ($) {
    function BrowseServerInput(object, type) {
        if (typeof type === 'undefined') {
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function (fileUrl, data) {
            fileUrl = fileUrl.replace(window.BASE_URL || '', "/");

            if (object.is('input')) {
                object.val(fileUrl);
            } else {
                object.attr('src', fileUrl);
            }
        };
        finder.popup();
    }

    $(document).ready(function () {
        $(document).on('click', '.input-image', function () {
            BrowseServerInput($(this));
            return false;
        });
    });
})(jQuery);
