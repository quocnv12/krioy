function notify(text,type)
{
    new Noty({
        text,
        type,
        theme:"bootstrap-v4",
        timeout:5000,
        progressBar:true
    }).show();
}