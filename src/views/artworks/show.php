<article id="artwork-detail">
    <div id="artwork-image">
        <img src="<?= htmlspecialchars($artwork['image']) ?>" alt="<?= htmlspecialchars($artwork['title']) ?>">
    </div>
    <div id="artwork-content">
        <h1><?= htmlspecialchars($artwork['title']) ?></h1>
        <p class="description"><?= htmlspecialchars($artwork['artist']) ?></p>
        <p class="full-description">
            <?= nl2br(htmlspecialchars($artwork['description'])) ?>
        </p>
    </div>
</article> 