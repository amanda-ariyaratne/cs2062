<?= $this->setSiteTitle('Home') ?>

<?= $this->start('head'); ?>

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<?= include("Categories.php"); ?>

<?= $this->end(); ?>