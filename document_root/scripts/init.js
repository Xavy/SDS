$(document).ready(function() {
    // ext linky otevirat v novem okne
    $('a[href^="http://"]').click(function(){
        window.open(this.href);
        return false;
    });
    
    // nastaveni menu
    $("#topbar ul li").hover(
        function (){
            $("ul",this).slideDown(100);
        },
        function (){
            $("ul",this).slideUp(100);
        }
    ); 
    
    // logo efekt
    $("#logo").click(function(){
        $(this).fadeOut("slow",function(){$(this).fadeIn("slow")}) ;
    });
    
    // zobrazi se media  
    //window.setTimeout(function() { $("#media").fadeIn("slow"); }, 1000);

    $("a.ajax").live("click", function (e) {
        e.preventDefault();
        var $this = $(this);
        var horizontalPadding = 30;
        var verticalPadding = 30;
        $('<iframe id="externalSite" frameborder="0" class="externalSite" src="' + this.href + '" />').dialog({
            title: ($this.attr('title')) ? $this.attr('title') : 'External Site',
            autoOpen: true,
            width: 550,
            height: 305,
            modal: true,
            resizable: false,
            autoResize: true,
            overlay: {
                opacity: 0.5,
                background: "black"
            }
        }).width(550 - horizontalPadding).height(305 - verticalPadding);
    });
});