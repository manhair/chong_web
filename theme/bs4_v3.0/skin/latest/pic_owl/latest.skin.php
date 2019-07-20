<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
// add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 210;
$thumb_height = 150;
?>

<div class="owl_gal_title text-center section-header pb-3">
	<h4 id="gal_title"><?php echo $bo_subject ?></h4>
</div>	
<div class="carousel-wrap">
	<div id="owl-pic" class="owl-carousel owl-theme">
		
		<?php
		for ($i=0; $i<count($list); $i++) {
		    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
		
		    if($thumb['src']) {
		        $img = $thumb['src'];
		    } else {
		        $img = G5_THEME_IMG_URL.'/no_image.png';
		        $thumb['alt'] = '이미지가 없습니다.';
		    }
		    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
		    ?>
			
			<div class="item">
			    <a href="<?php echo $list[$i]['href'] ?>" class="lt_img"><?php echo $img_content; ?></a>
			</div>
		<?php }  ?>
		<?php if (count($list) == 0) { //게시물이 없을 때  ?>
			<div class="item">게시물이 없습니다.</div>
		<?php }  ?>
	</div>
</div>
