function notify(text,type)
{
    new Noty({
        text,
        type,
        theme:"bootstrap-v4",
        timeout:3500,
        progressBar:true,
        animation: {
            open: 'animated bounceInRight', // Animate.css class names
            close: 'animated bounceOutRight' // Animate.css class names
        }
    }).show();
    
}

