<?php
function forum_item($amount_to_show) {
    class Info_Box {
      public $title;
      public $image;
      public $about;
    
      function __construct($title, $image, $about) {
        $this->title = $title;
        $this->image = $image;
        $this->about = $about;
      }
    }
    
    $info_boxes = get_project_data();
    $county = count($info_boxes);
    if ($amount_to_show > $county) {
      $amount_to_show = $county;
    }

    $output = "";
    $output .= '<div class="forum-row">';
    foreach ($item_box : $info_boxes) {
      $output .= getInfoAsBox($item_box);
    }
    $output .= '</div>'; 
    return $output;
}
function get_project_data() {
    $projects_dir = "/project_page/projects";
    $info_boxes = [
      new Info_Box(
    "Should I get a tentacle enlargement?", # Box Title
    "/img/CrimsonHacks/question_mark.jpg", # Link to image that is displayed in the box, "NONE" if there is none
    "My wife wants me bigger, I dont want bigger"), # Description of project

      new Info_Box(
    "My Operating System Built From Scratch",
    "$projects_dir/os_making/img/qemu1.png",
    "Currently at the \"Bare Bones\" stage in the <a href='osdev.org'>OSDev guide website</a>"),

    ];
    return $info_boxes;
}
function getInfoAsBox($info_box) {
        $title = $info_box->title;
        #$image = (strtolower($info_box->image) == "none") ? "" : "<a href='$info_box->href'><img src=$info_box->image alt='Image not found' width='100%' height='auto'></a>";
        $image = $info_box->image;
        return "
            <div class='forum-card'>
                <div class='forum-title'>
                  <img src='$image'>
                  $title
                </div>
                <div class='forum-about'><h4>$info_box->about</h4></div>
            </div>
        </div>";
};
function title() {
return "
<div class='welcome'>
<h1>Forums</h1>
<h2>Spot to share your experiences</h2>
</div>
";}
function alien_ad() {
  $path = '/img/CrimsonHacks/ads';
  $files = scandir($path);
  $k = array_rand($array);
  $v = $array[$k];
  echo "<div class='advertisement'><img src='$v'</div>";
}
?>

