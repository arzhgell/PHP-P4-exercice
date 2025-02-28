<?php if ($success): ?>
    <div class="message success">
        L'œuvre a été ajoutée avec succès ! Vous allez être redirigé vers la page d'accueil...
    </div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="message error">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/ajouter" method="POST">
    <div class="form-field">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title" 
               value="<?= isset($formData['title']) ? htmlspecialchars($formData['title']) : '' ?>" 
               required>
    </div>
    <div class="form-field">
        <label for="artist">Artiste</label>
        <input type="text" name="artist" id="artist" 
               value="<?= isset($formData['artist']) ? htmlspecialchars($formData['artist']) : '' ?>" 
               required>
    </div>
    <div class="form-field">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image" 
               value="<?= isset($formData['image']) ? htmlspecialchars($formData['image']) : '' ?>" 
               required>
    </div>
    <div class="form-field">
        <label for="description">Description</label>
        <textarea name="description" id="description" required><?= isset($formData['description']) ? htmlspecialchars($formData['description']) : '' ?></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form> 