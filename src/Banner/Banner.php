<?php
namespace Knight23\Core\Banner;

use Knight23\Core\Knight23;
use Knight23\Core\Colors\Colors;

class Banner implements BannerInterface
{
    public function __construct()
    {

    }

    /**
     * @return string
     */
    public function getBanner()
    {
        $bannerText = <<<EOT
 @@@  @@@ @@@  @@@ @@@  @@@@@@@  @@@  @@@ @@@@@@@  @@@@@@  @@@@@@
 @@!  !@@ @@!@!@@@ @@! !@@       @@!  @@@   @@!   @@   @@@     @@!
 @!@@!@!  @!@@!!@! !!@ !@! @!@!@ @!@!@!@!   @!!     .!!@!   @!!!:
 !!: :!!  !!:  !!! !!: :!!   !!: !!:  !!!   !!:    !!:         !!:
  :   ::: ::    :  :    :: :: :   :   : :    :    :.:: ::: ::: ::
EOT;

        $version = str_pad("Knight23 Runner Version: ".Knight23::VERSION, 66, " ", STR_PAD_BOTH);

        return Colors::COLOR_FG_RED.$bannerText.Colors::RESET."\n".Colors::COLOR_FGL_YELLOW.$version.Colors::RESET;
    }
}
