<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $movie['title']; ?></h5>
    <p class="card-text"><?php echo substr($movie['plot'], 0, 50); ?>...</p>
    <?php echo '<a href="detail.php?id=' . $movie['id'] . '"title="' . $movie['title'] . '">';
    echo '<img src="img/posters/' . $movie['image'] . '" alt="' . $movie['title'] . '">'; ?> </a>
  </div>
</div>