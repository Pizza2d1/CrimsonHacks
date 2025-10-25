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
    foreach ($info_boxes as $item_box) {
      $output .= getInfoAsBox($item_box);
    }
    $output .= '</div>'; 
    $output .= '<br>'; 
    return $output;
}
function get_project_data() {
  $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae sodales ipsum. Ut egestas felis orci, eget bibendum erat scelerisque scelerisque. Donec et pretium libero, vel aliquet ipsum. Aliquam nec velit et nisl gravida posuere. Maecenas ipsum est, tempor sed quam ac, lobortis ultrices est. Maecenas eget lobortis sapien, a scelerisque sem. Nulla nec nibh ac erat aliquam egestas sit amet vitae neque.

In consequat nunc eu lectus scelerisque, quis vehicula tellus lobortis. Etiam faucibus imperdiet arcu. Mauris vehicula porta condimentum. Donec eu quam vestibulum, viverra libero ac, molestie elit. Donec sollicitudin nec est a rhoncus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam faucibus lacus a lectus lobortis elementum non vel dui. Sed scelerisque, nisi nec lacinia pharetra, turpis massa lobortis ligula, eu commodo augue est sit amet velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce vel laoreet arcu. Cras mattis, massa id mollis lobortis, erat felis condimentum sem, at eleifend ante arcu nec mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi velit dolor, lobortis sit amet viverra nec, imperdiet eu felis.";

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
    )
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
        $about = $info_box->about;
        return "
            <div class='forum-card'>
                <div class='forum-title'>
                  <img src='$image'>
                  $title
                </div>
                <div class='forum-about'><h4>$about</h4></div>
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
  echo "<div class='advertisement'><img src='/CrimsonHacks/img/ads/hot_aliens.png'</div>";
}
?>

