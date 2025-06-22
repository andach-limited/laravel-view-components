(function()
{
    document.querySelectorAll('.lvc-alert-dismiss').forEach(item => {
        item.addEventListener('click', e => {
            e.currentTarget.parentNode.remove();
        })
    });
}());
