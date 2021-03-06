<!DOCTYLE HTML>
<html>
    <head>
        <?php
        require_once("ipaddress.php");
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=3, minimum-scale=1, user-scalable=no">
        <title>QRCode Scanner</title>
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/vue.min.js"></script>
        <script type="text/javascript" src="js/instascan.min.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>
        <h1 class="title"></h1>
        <video id="preview"></video>
        <div id="app">
            <div class="cameras">
                <div v-if="cameras.length === 0" class="empty"><p class="msg">No cameras found</p></div>
            </div>
            <div class="scans">
                <div name="scans" tag="ul">
                    <label class="scanContent" v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</label>
                </div>
            </div>
        </div>
        <div class="backBtnContainer"><button class="buttons">Back</button></div>
        <script type="text/javascript" src="js/app.js"></script>
        <script>
            $(document).ready(() => {
                
                var Id = getUrlParameter('Id');
                var Username = getUrlParameter('Username');
                var Password = getUrlParameter('Password');
                var CategoryName = getUrlParameter('CategoryName');
                var CategoryNameText = getUrlParameter('CategoryNameText');
                var OtherInformationName = getUrlParameter('OtherInformationName');
                var OtherInformationNameText = getUrlParameter('OtherInformationNameText'); 
                var OtherInformationType = getUrlParameter('OtherInformationType');
                
                $(".title").text(CategoryNameText + " - " + OtherInformationNameText);
                
                $('.scans').eq(0).bind("DOMSubtreeModified",function(){
                    window.location.href = $('.scanContent').html()+"&&SpreadSheetColumnId="+Id+"&&CategoryName="+CategoryName+"&&CategoryNameText="+CategoryNameText+"&&OtherInformationName="+OtherInformationName+"&&OtherInformationNameText="+OtherInformationNameText+"&&OtherInformationType="+OtherInformationType+"&&Username="+Username+"&&Password="+Password;
                });
                
                var backBtn = document.getElementsByClassName("backBtnContainer")[0];

                backBtn.onclick = function() {
                    window.location.href = "https://<?php echo $ipaddress ?>/EventDat/admin/organizerSelection.php?Id=" + Id + "&&Username=" + Username + "&&Password=" + Password;
                }
            });
        </script>
        <script>
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : sParameterName[1];
                    }
                }
            };
        </script>
        <script>
            document.getElementById("preview").style.cssText = "-moz-transform: scale(1, 1); \ -webkit-transform: scale(1, 1); -o-transform: scale(1, 1); \ transform: scale(1, 1); filter: FlipH;";
        </script>
    </body>
</html>