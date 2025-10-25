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
    ""
    ),
      new Info_Box(
    "Am I a prostitute for \"doing it\" for a chili dog?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    ""
    ),
      new Info_Box(
    "I cut my wife off from our finances because she wouldn’t stop ordering chili dogs, Am I the Asshole?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    ""
    ),
      new Info_Box(
    "I find my wife unattractive after getting a tenticle enlargement, Am I the Asshole?",
    "/CrimsonHacks/img/leader.png", # Link to image that is displayed in the box, "NONE" if there is none
    ""
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
            <div class='forum-card' style='border: 5px solid black; border-radius: 5px; margin: 10px; padding: 10px;'>
                <div class='forum-title'>
                  <img style='width: 80px;' src='$image'>
                  <h2>$title</h2>
                </div>
                <div class='forum-about'><h4>$about</h4></div>
                <svg style='width: 24px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 640'><path d='M576 304C576 436.5 461.4 544 320 544C282.9 544 247.7 536.6 215.9 523.3L97.5 574.1C88.1 578.1 77.3 575.8 70.4 568.3C63.5 560.8 62 549.8 66.8 540.8L115.6 448.6C83.2 408.3 64 358.3 64 304C64 171.5 178.6 64 320 64C461.4 64 576 171.5 576 304z'/></svg>
                3
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

