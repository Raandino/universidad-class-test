$(".pop-up-activate").click(function(){
    $(this).css("display", "none")
    $("body").css("pointer-events", "none");
    $(".pop-up").css("display", "flex")
});
$(".pop-up-cerrar").click(function(){
    $(this).css("display", "none")
    $("body").css("pointer-events", "none");
    $(".pop-up-sesion").css("display", "flex")
});

$(".pop-up-del").click(function(){
    $(this).css("display", "none")
    const father = $(this).text()
    const replace = father.slice(6);
    
    console.log(replace)
    $('a.toDelete').each(function(){
        this.href = this.href.replace('replace', replace);

    });
    $("body").css("pointer-events", "none");
    $(".pop-up-borrar").css("display", "flex")
    
});

$(".pop-up-del-multi").click(function(){
    $(this).css("display", "none")
    if($(this).css('display') == 'none')
{
    const father = $(this).find('p')
    console.log(father)
    const replace = father.slice(0,1).text();
    console.log(replace)
    const replace2 = father.slice(1,2).text();
    console.log(replace2)
    const replace3 = father.slice(2,3).text();
    console.log(replace3)
    const replace4 = father.slice(3,4).text();
    console.log(replace4)
    const replace5 = father.slice(4,5).text();
    console.log(replace5)
    $('a.toDelete').each(function(){
        this.href = this.href.replace('replace', replace);
        this.href = this.href.replace('replace2', replace2);
        this.href = this.href.replace('replace3', replace3);
        this.href = this.href.replace('replace4', replace4);
        this.href = this.href.replace('replace5', replace5);
    });
    $("body").css("pointer-events", "none");
    $(".pop-up-borrar").css("display", "flex")
}
    
    
});
$(".pop-up-cancel").click(function(){
    $(".pop-up-activate").css("display", "inline")
    $(".pop-up-del").css("display", "inline")
    $(".pop-up-del-multi").css("display", "inline")
    $(".pop-up-cerrar").css("display", "inline")
    $("body").css("pointer-events", "all");
    $(".pop-up").css("display", "none")
    $(".pop-up-borrar").css("display", "none")
    $(".pop-up-error").css("display", "none")
    $(".pop-up-sesion").css("display", "none")

    
});
function change(){
    const url = window.location.href;  
    const selectBox = $(".replace");
    const father = selectBox.find('option')
    const Valor = selectBox.prop('selectedIndex')
    const change = father.slice(Valor,Valor+1).text();

    var request = new XMLHttpRequest();
    // POST to httpbin which returns the POST data as JSON
    request.open('POST', url, /* async = */ false);

    var formData = new FormData(change);
    formData.append('change', change);
    request.send(formData)
    console.log(request.response)
    /*fetch(url, { method: 'POST', body: formData})
    
     console.log(fetch(url, { method: 'POST', body: formData}));*/
}

$("document").ready(function(){
    const clickeado = $("a.menu")
    const largo = clickeado.length
    const url = window.location.href;  
    for(var i=0; i<largo; i++){
        if(clickeado[i] == url){
            console.log(clickeado[i].href)
            $(clickeado[i]).toggleClass('toggle-side')
        }
    }
        
})

$(document).keydown(function(e) {

    // Set self as the current item in focus
    var self = $(':focus'),
        // Set the form by the current item in focus
        form = self.parents('form:eq(0)'),
        focusable;
  
    // Array of Indexable/Tab-able items
    focusable = form.find('input,a,select,button,textarea,div[contenteditable=true]').filter(':visible');
  
    function enterKey(){
      if (e.which === 13 && !self.is('textarea,div[contenteditable=true]')) { // [Enter] key
  
        // If not a regular hyperlink/button/textarea
        if ($.inArray(self, focusable) && (!self.is('a,button'))){
          // Then prevent the default [Enter] key behaviour from submitting the form
          e.preventDefault();
        } // Otherwise follow the link/button as by design, or put new line in textarea
  
        // Focus on the next item (either previous or next depending on shift)
        focusable.eq(focusable.index(self) + (e.shiftKey ? -1 : 1)).focus();
  
        return false;
      }
    }
    // We need to capture the [Shift] key and check the [Enter] key either way.
    if (e.shiftKey) { enterKey() } else { enterKey() }
  });
