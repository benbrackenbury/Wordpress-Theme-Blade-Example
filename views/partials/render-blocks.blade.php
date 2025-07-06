@php
global $post;
$rendered_blocks = do_blocks( $post->post_content );
echo $rendered_blocks;
@endphp
