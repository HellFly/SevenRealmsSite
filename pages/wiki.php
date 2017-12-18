<?php
$wiki_page = 'home';
if (isset($_GET['wiki_page'])) {
	$wiki_page = mysqli_real_escape_string($DB, $_GET['wiki_page']);
}

$query = 'SELECT page_wiki.id, page_wiki.last_edit, user.username AS username, page_wiki.title, page_wiki.content
	FROM page_wiki, user
	WHERE page_wiki.title = \'' . $wiki_page . '\'
	AND page_wiki.last_edit_by = user.id;';

$result = mysqli_query($DB, $query);

$wiki_title = ucfirst($wiki_page);
$wiki_content = 'The page \'' . $wiki_title . '\' does not exist yet.';
if ($ISADMIN) {
	$wiki_content .= '<br/><br/><a href="?page=wiki_edit&wiki_page=' . $wiki_page . '" class="btn btn-primary">Create</a>';
}

if (mysqli_num_rows($result)) {
	$row = mysqli_fetch_assoc($result);
	$wiki_title = ucfirst($row['title']);
	$wiki_content = $row['content'];
	if ($ISADMIN) {
		$wiki_content .= '<br/><hr/><a href="?page=wiki_edit&wiki_page=' . $wiki_page . '" class="btn btn-primary">Edit</a>';
	}
}
?>
<div class="col-md-12 mb-3">
	<div class="card">
		<div class="card-body">
			<h1 class="card-title"><?php echo $wiki_title; ?></h1>
			<hr/>
			<p class="card-text">
				<?php echo $wiki_content; ?>
			</p>
		</div>
	</div>
</div>
