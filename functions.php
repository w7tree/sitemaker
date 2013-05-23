<?php
// ==================================================
// 各種カスタム機能の有効化/*{{{*/
// ==================================================

// カスタムメニュー
add_theme_support( 'menus' );

if ( function_exists('register_nav_menu') ) {
  // register_nav_menu('header-nav', 'ヘッダーナビ');
  // register_nav_menu('footer-nav', 'フッターナビ');
}

// サイドバーwidgetの有効化
if ( function_exists('register_sidebar') ) {
  register_sidebar();
}

// サムネイル機能の記述
add_theme_support('post-thumbnails');
set_post_thumbnail_size('110,160,true');

/*}}}*/

// ==================================================
// ページ最上部の管理バーを常に削除する/*{{{*/
// ==================================================
function kill_top_admin_bar(){
    return false;
}
// show_admin_barにフィルターする。最後に処理してもらいたいので、1,000番目に登録。
add_filter( 'show_admin_bar', 'kill_top_admin_bar' , 1000 );

/*}}}*/

// ==================================================
// wp_headの不要情報を削除する/*{{{*/
// 参考URL: http://memocarilog.info/wordpress/theme-custom/2667
// 参考URL: http://blog.we-boxes.com/wordpress/wordpress-wp_head_action_hook/
// どのようなアクションがあるのかの一覧は/wp-ijnclude/default-filters.phpの200行目付近にて確認
// ==================================================

// wordpressのバージョン情報
remove_action('wp_head', 'wp_generator');

// デフォルトIDをつかったパーマリンクではない短いURLの情報表示。不要
remove_action('wp_head', 'wp_shortlink_wp_head');

// 前後文章の認識。意味がないので削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// リモート投稿関連
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// canonical。All-in-One-SEOで設定できるので削除
remove_action('wp_head', 'rel_canonical');

// print用CSS(判断がつかないため保留)
// remove_action('wp_head', 'wp_print_styles', 8);
// remove_action('wp_head', 'wp_print_head_scripts', 9);

// 下記add_action('wp_head','feed_links',2); によって自動でFeed情報を出力するために必要な記述。
add_theme_support('automatic-feed-links');

// RSSフィードの本体サイトのFeedを出力。場合により不要
remove_action('wp_head','feed_links',2);

// RSSフィードのカテゴリーのフィード,コメントフィードなど特殊なものを出力。不要
remove_action('wp_head','feed_links_extra',3);

// Feed関連参考: http://creamo.jp/wordpress/wordpress-feed-custom/

// インラインスタイル削除(head最下部の.recentcommentsのcss。なぜかダブっている片方しか消えない)
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

/*}}}*/

// ==================================================
// オリジナル関数/*{{{*/
// ==================================================

// 固定ページの場合に、テンプレファイル名(から.phpを除いたもの)をidとして出力する/*{{{*/
function page_id() {
	$id = basename(get_page_template_slug(),".php");
	echo 'id="' . $id . '"';
}
/*}}}*/

// 記事の文字数を数える関数/*{{{*/
function the_article_str_count($content) {
  $str_count = mb_strlen(strip_tags($content),'utf8');
  return $str_count;
}
/*}}}*/

// 記事を読むのにかかる時間を計算する関数/*{{{*/
function the_article_read_time($content) {
  $ml_time = round(the_article_str_count($content) / 7.8);
  $time = date('i分s秒',$ml_time);
  return $time;
}
/*}}}*/

//引数が指定文字数を超えたら[…]を出力する/*{{{*/
function print_dotted_over_string($str,$maxlength) {
  $str_count = mb_strlen(strip_tags($str),'utf8');
	if ( $str_count >= $maxlength ) {
		echo "[…]" ;
	}
}
/*}}}*/

/*}}}*/

