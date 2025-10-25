<?php
include_once("./lorem.php");
function forum_item() {
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

    $output = "";
    $output .= '<div class="forum-row">';
    #foreach ($item_box : $info_boxes) {
    #  $output .= getInfoAsBox($item_box);
    #}
    $output .= '</div>'; 
    $output .= '<br>'; 
    return $output;
}
function get_project_data() {
  $lorem = "balls";

    $projects_dir = "/project_page/projects";
    
    $info_boxes = [
      new Info_Box(
    "I locked my son in his room for insulting Karl Mars, Am I the Asshole?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    $lorem
    ),
      new Info_Box(
    "I cut my wife off from our finances because she wouldn’t stop ordering chili dogs, Am I the Asshole?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    $lorem
    ),
      new Info_Box(
    "I find my wife unattractive after getting a tenticle enlargement, Am I the Asshole?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    $lorem
    ),
      new Info_Box(
    "Am I a prostitute for \"doing it\" for a chili dog?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    $lorem
    ),
    #  new Info_Box(
    #"My Operating System Built From Scratch",
    #"$projects_dir/os_making/img/qemu1.png",
    #"Currently at the \"Bare Bones\" stage in the <a href='osdev.org'>OSDev guide website</a>"),
        

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

