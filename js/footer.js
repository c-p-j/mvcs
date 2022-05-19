$(document).ready(function() {
    let bodyHeight = $(document).outerHeight()
    let footerHeight = $('#footer').outerHeight()

    let bodyWrapperHeight = bodyHeight - footerHeight
    $('#body-wrapper').css('height', `${bodyWrapperHeight}px`)
})