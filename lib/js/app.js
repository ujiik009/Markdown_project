/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function requestFullScreen() {
  if (elementPrototype.requestFullscreen) {
    document.documentElement.requestFullscreen();
  } else if (elementPrototype.webkitRequestFullScreen) {
    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
  } else if (elementPrototype.mozRequestFullScreen) {
    document.documentElement.mozRequestFullScreen();
  } else {
    /* fail silently */
  }
}


function fullpage(){
     var fullpage =$("#fullpage");
    fullpage.click(function(){
        function getmodal_html_tag(){
            $("#header-modal-html-tag").html("html".toUpperCase());
            //$("#content-modal").css("overflow","scroll");
             $("#content-modal-html-tag").html(htm);
            $('#preview-html-modal-tag').modal('show');

        }
       getmodal_html_tag();
    });

}
function rename_doc(){
   var $doc_name= $("#doc_name");
   var $doc_name_div= $("#doc_name_div");
   $doc_name_div.html($doc_name.val());
   $doc_name_div.click(function(){
        $doc_name.show();
        $doc_name_div.hide();
        $doc_name.blur(function(){
            $doc_name.hide();
            $doc_name_div.show();
            if($doc_name.val()==""){

                $doc_name.val("Document");
            }
            $doc_name_div.html($doc_name.val());
            
            
        });

   });

   
return null;
}


function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
 function converter(){
        // convert syntax markdown to html start
        var converter = new showdown.Converter({extensions: ['table']}),
        text= $("#markdown1").val(),
        html= converter.makeHtml(text);
        // convert syntax markdown to html stop
        
        
        $("#markdown2").html("<br>"+html);
        MD_text=text;
        htm=html;
        
        //return html;
}


function savetodisk(doc_name){
    $(".item .export").click(function(data){
            var type_file = $(this).attr("data-myValue");
            var doc_name=$("#doc_name").val();
            var cookie_uid=readCookie('UID')+"/"; // 20161019024655/ 
            var path='/../temp/'+cookie_uid+doc_name;
            if(type_file=="HTML"){
                var file = new Blob([htm], {type: "text/plain;charset=utf-8"}); //IE<10
                saveAs(file, doc_name+".html"); 
                $.simplyToast('Export file html '+doc_name+".html"+' successful!', 'success');
            }else if(type_file=="MD"){
                var file = new Blob([MD_text], {type: "text/plain;charset=utf-8"}); //IE<10
                saveAs(file, doc_name+".md"); 
                $.simplyToast('Export file markdown '+doc_name+".md"+' successful!', 'success');
            }else{
                $.simplyToast('Error', 'danger');
            }
      
       
            
    });
}

function preview_as_html(){
    var PREVIEW_AS_HTML =$("#PREVIEW_AS_HTML");
    PREVIEW_AS_HTML.click(function(){
        function getmodal_html(){
            $("#header-modal-html").html("html source code".toUpperCase());
            //$("#content-modal").css("overflow","scroll");
             $("#content-modal-html").html(htm);
            $('#preview-html-modal').modal('show');

        }
       getmodal_html();
    });
}
function preview_as_pdf(){
    var PREVIEW_AS_PDF =$("#PREVIEW_AS_PDF");
    PREVIEW_AS_PDF.click(function(){
        alert("preview_as_pdf");
    });
    
    
}

function preview_as_markdown(){
    var PREVIEW_AS_MARKDOWN =$("#PREVIEW_AS_MARKDOWN");
    PREVIEW_AS_MARKDOWN.click(function(){
        function getmodal_markdown(){
            $("#header-modal-markdown").html("markdown source code".toUpperCase());
            //$("#content-modal").css("overflow","scroll");
             $("#content-modal-markdown").val($("#markdown1").val());
            $('#preview-markdown-modal').modal('show');

        }
       getmodal_markdown();
    });
    
    
}



    $(function() {
        $("#logo").click(function(){
            requestFullScreen();
        });
    	$('#markdown1').numberedtextarea().allowTabChar();
        $('.ui.dropdown').dropdown();
        var htm;
        var MD_text; 
        converter();
        rename_doc();
        savetodisk();
        preview_as_html();
        preview_as_pdf();
        preview_as_markdown();
        fullpage();
       
    });
    
    
          
    
    



