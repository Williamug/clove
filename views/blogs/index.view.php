<?php include_once(dirname(__DIR__) . "/partials/header.view.php"); ?>
	<div class="mt-5">
		<table class="table">
  			<thead class="thead-dark">
    			<tr>
      				<th scope="col">#</th>
      				<th scope="col">Title</th>
      				<th scope="col">Body</th>
      				<th scope="col">Action</th>
    			</tr>
  			</thead>
  			<tbody>
  				<?php foreach($posts as $post): ?>
    				<tr>
      					<th scope="row"><?= $post['id'] ?></th>
     				 	<td><?= $post['title'] ?></td>
      					<td><?= $post['body'] ?></td>
      					<td>
      						<div class="row">
      							<div class="col-4 text-success">View</div>
      							<div class="col-4 text-primary">Edit</div>
      							<div class="col-4 text-danger">Delete</div>
      						</div>
      					</td>
    				</tr>
    			<?php endforeach; ?>
  			</tbody>
		</table>
	</div>
<?php include('../partials/footer.view.php') ?>

