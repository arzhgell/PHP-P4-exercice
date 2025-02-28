<div id="artwork-list">
    <?php foreach($artworks as $artwork): ?>
        <article class="artwork">
            <a href="/artwork/<?= $artwork['id'] ?>">
                <img src="<?= htmlspecialchars($artwork['image']) ?>" alt="<?= htmlspecialchars($artwork['title']) ?>">
                <h2><?= htmlspecialchars($artwork['title']) ?></h2>
                <p class="description"><?= htmlspecialchars($artwork['artist']) ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div> 