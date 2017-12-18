<?php
include '_admin.php';

$warning = '';
$message = '';

$wiki_page = 'home';
if (isset($_GET['wiki_page'])) {
	$wiki_page = mysqli_real_escape_string($DB, $_GET['wiki_page']);
}

if (isset($_POST['wiki_id'])) {
	$id = mysqli_real_escape_string($DB, $_POST['wiki_id']);
	$title = $wiki_page;
	$content = bb_to_html(mysqli_real_escape_string($DB, nl2br_real($_POST['content'])));

	if ($id != -1) {
		$query = 'UPDATE `page_wiki`
		SET content=\'' . $content . '\',
		last_edit=\'' . get_datetime() . '\',
		last_edit_by=\'' . $USERID . '\'
		WHERE id=' . $id . ';';
	}
	else {
		$query = 'INSERT INTO `page_wiki` (`last_edit`, `last_edit_by`, `title`, `content`)
		VALUES (
			\'' . get_datetime() . '\',
			\'' . $USERID . '\',
			\'' . $title . '\',
			\'' . $content . '\'
		);';
	}
	$result = mysqli_query($DB, $query);
	if ($result) {
		header('Refresh: 0; url=?page=wiki&wiki_page=' . $wiki_page);
		exit();
	}
	else {
		$warning = mysqli_error($DB);
	}
}

$query = 'SELECT id, title, content FROM page_wiki;';
$result = mysqli_query($DB, $query);

$wiki_title = ucfirst($wiki_page);
$wiki_content = '';
$wiki_id = -1;

if (mysqli_num_rows($result)) {
	$row = mysqli_fetch_assoc($result);
	$wiki_content = html_to_bb(br2nl($row['content']));
	$wiki_id = $row['id'];
}

if ($message != '') { ?>
	<div class="alert alert-success" role="alert">
		<?php echo $message; ?>
	</div>
<?php }
if ($warning != '') { ?>
	<div class="alert alert-warning" role="alert">
		<?php echo $warning; ?>
	</div>
<?php }
?>

<div class="col-md-12 mb-3">
	<div class="card">
		<div class="card-body">
			<h1 class="card-title"><?php echo $wiki_title; ?></h1>
			<hr/>
			<form action="" method="POST">
				<div class="form-group">
					<textarea style="font-family: courier new;" class="form-control" name="content" rows="18"><?php echo $wiki_content; ?></textarea>
				</div>
				<input name="wiki_id" type="hidden" value="<?php echo $wiki_id; ?>"></input>
				<a href="?page=wiki&wiki_page=<?php echo $wiki_page; ?>" class="btn btn-primary">Back</a>
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
			<hr/>
			<h4>BB Code</h4>
			This is a list of the available BB codes:
			<ul>
				<li>This is <b>bold</b> text <code>This is [b]bold[/b] text</code></li>
				<li>This is <i>italic</i> text <code>This is [i]italic[/i] text</code></li>
				<li>This is <u>underlined</u> text <code>This is [u]underlined[/u] text</code></li>
				<li>This is <span style="color: red">colored</span> text <code>This is [color=red]colored[/color] text</code></li>
				<li>This is a <a target="_blank" href="https://google.nl">link</a> <code>This is a [url=https://google.nl]link[/url]</code></li>
				<li>This is an image <img src="http://lorempixel.com/output/nature-q-c-128-64-2.jpg" alt="" /> <code>This is an image [img]http://lorempixel.com/output/nature-q-c-128-64-2.jpg[/img]</code></li>
				<li>This is a link to a <a href="?page=wiki&wiki_page=new page">new page</a> on this wiki <code>This is a link to a [page=new page]new page[/page] on this wiki</code></li>
			</ul>
		</div>
	</div>
</div>
