<?
namespace Altasib\Starterkit\Debug;

class Functions
{
    public static function clearPre(&$content)
    {
        global $USER;
        if(!isset($_REQUEST["dev"])){
            if(!$USER->IsAdmin()){
                if(strpos($content,'<pre class="debug"') !== false){
                    $content = preg_replace("#<pre class=\"debug\">(.*?)</pre>#is","",$content);
                }
            }
        }
    }

    public static function isDev()
    {
        global $APPLICATION;

        if(isset($_REQUEST["PDA"]) && $_REQUEST["PDA"] == "Y"){
            $_SESSION["DEV"] = "Y";
            LocalRedirect($APPLICATION->GetCurDir());
        }

        if(isset($_REQUEST["DEV"]) && $_REQUEST["DEV"] == "Y"){
            $_SESSION["DEV"] = "Y";
            LocalRedirect($APPLICATION->GetCurDir());
        }

        if(isset($_REQUEST["DEV"]) && $_REQUEST["DEV"] == "N"){
            $_SESSION["DEV"] = "N";
            LocalRedirect($APPLICATION->GetCurDir());
        }

    }

    public static function isDevTask()
    {
        global $APPLICATION;

        if($_SESSION["DEV"] == "Y"){
            //задача для dev режима
//            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/media.js");
//            $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/media.css");
        }

    }

    public static function isDevTaskOnPageStart(){
        if($_SESSION["DEV"] == "Y") {
            //задача для dev режима(например переопределение шаблона)
            //define("SITE_TEMPLATE_ID", "elf_2016");
        }
    }

    public static function checkSendMail($to_addr){
        //$to_addr = "dionis@global-arts.ru, dions.78@gmail.com";
        $subject = "Тест1";
        $header = "***Тест***1";
        $message = "Бла, бла, бла\n\rБла, бла, бла\n\rБла, бла, бла\n\rБла, бла, бла\n\rБла, бла, бла";
        var_dump(mail($to_addr, $subject, $message, $header));
    }
}

?>