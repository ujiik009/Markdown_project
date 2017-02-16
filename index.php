<!DOCTYPE html>
<html>
    <head>
        <?php
        //gen uid
        $cookie_name = "UID";
        $cookie_value = date("YmdHis");
        $path_temp = "temp/";
        if(!isset ($_COOKIE[$cookie_name])){
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        //temp\20161023222319
        mkdir($path_temp.$cookie_value,0775);
        // temp\20161023222319\MD_file
        mkdir($path_temp.$cookie_value."/MD_file",0775);
        //temp\20161023222319\PDF_file
        mkdir($path_temp.$cookie_value."/PDF_file",0775);
        }else{
           
        }
        //
        ?>
        <title>Markdown Editor</title>
        
        <script src="lib/js/showdown.js" ></script>
        <script src="lib/js/showdown-table.js" ></script>
        <script src="lib/js/jquery-3.1.0.min.js"></script>
        <script src="lib/js/jquery.numberedtextarea.js"></script>
        <script src="lib/js/textareasync.js"></script>
        <script src="lib/js/FileSaver.js"></script>
        <script src="lib/js/jspdf.debug.js"></script>
        <script src="lib/js/fullscreen-api-shim.js"></script>
        <script src="lib/js/simply-toast.min.js"></script>
        <script src="lib/Semantic-UI-CSS-master//semantic.js"></script>
        
        
        <link rel="shortcut icon" href="img/md-icon.png.ico"/>
        <link rel="stylesheet" type="text/css" href="lib/Semantic-UI-CSS-master/semantic.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/custom_input.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/jquery.numberedtextarea.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/simply-toast.min.css"/>
        
    </head>

    <body >
    <!--    // nav bar start-->
    <div class="ui inverted  menu" id="navbar_top">
      <a class="banner item" id="logo">
          <h3>M<i class="small long arrow down icon" style="margin-left: -3px; margin-top: -3px;"></i></h3>Editor
      </a>
      <div class="right floating fixed menu ">
        <div class="item dropdown " >
          <div class="ui icon input">
            <input type="text" placeholder="Search..." id='doc_name' value='Document' >
          </div> 
          <div id="doc_name_div" style="width: inherit;height: inherit;" data-tooltip="Rename Document" data-position="bottom left">
            
          </div>
          
        </div>

        <a class="ui dropdown item" >PREVIEW AS
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item" id="PREVIEW_AS_HTML" target="iframe"> 
                    <i class="code outline icon"></i>HTML
                </div>
                <div class="item" id="PREVIEW_AS_PDF" target="iframe" >
                    <i class="file pdf outline icon"></i>PDF
                </div>
                <div class="item" id="PREVIEW_AS_MARKDOWN" target="iframe" >
                    <i class="unhide icon"></i>MARKDOWN
                </div>
            </div>
        </a>
            
           
        <a class="ui dropdown item" >EXPORT AS
            <i class="dropdown icon"></i>
            <div class="menu">
                <div class="item export" id="EXPORT_AS_HTML" data-myValue="HTML">
                    <i class="download icon"></i>HTML FILE
                </div>
                <div class="item export" id="EXPORT_AS_MARKDOWN" data-myValue="MD">
                    <i class="download icon"></i>MARKDOWN FILE
                </div>
            </div>
        </a>
          
      </div>
    </div>

    <!--    // nav bar stop-->

            
    <!--editor start        -->
        <div class="ui two column divided grid">
            
            <div class="eight wide column" >
                <div class="eight wide column nav_input_and_preview" >
                    <h3>
                        markdown
                    <a id="line" style="float: right; color: #bac7db;padding-left: 5px;"> <a  style="color: inherit;float: right">Line : </a></a>
                    </h3>
                </div>
                <textarea  id="markdown1" onkeyup="converter()"  class="input_and_preview" onscroll="og_scroll(this);">
                    <?php include 'example/example.md';?>
                </textarea>
            </div>
            
            <div class="eight wide column" >
                <div class="eight wide column nav_input_and_preview" >
                    <h3>preview 
                    <a id="fullpage" style="float: right; color: #bac7db;padding-left: 5px;" data-tooltip="fullscreen" data-position="bottom right"> 
                    <i class="maximize icon"></i>
                    </a>
                    </h3>
                    
                </div>
                <p rows="30"  id="markdown2"  class="input_and_preview preview" onscroll="og_scroll(this);"></p>
            </div>
        </div>
    <!--editor stop        -->


        <!-- modal start html -->
            <div class="ui modal" id="preview-html-modal">
              <i class="close icon"></i>
              <div class="header " id="header-modal-html">
                Profile Picture
              </div>
             <!--  <div class="content" id="content-modal-html-tag">
               
              </div> -->
              <textarea class="content" id="content-modal-html"></textarea>
            </div>
        <!--   modal stop html-->

         <!-- modal start html tag fullpagr -->
            <div class="ui modal" id="preview-html-modal-tag">
              <i class="close icon"></i>
              <div class="header " id="header-modal-html-tag">
                Profile Picture
              </div>
              <div class="content" id="content-modal-html-tag">
               
              </div>
              
            </div>
        <!--   modal stop html-->


        <!-- modal start markdown -->
            <div class="ui modal" id="preview-markdown-modal">
              <i class="close icon"></i>
              <div class="header " id="header-modal-markdown">
                Profile Picture
              </div>
              <div class="content" >
               <textarea id="content-modal-markdown"></textarea>
              </div>
            </div>
        <!--   modal stop markdown-->
    </body>
<script>
   
</script>

 <script src="lib/js/app.js"></script>
 


</html>