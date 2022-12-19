<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination">
		<?php if($pager->hasPreviousPage()) : ?>
			<li class="page-item pe-1">
				<a class="page-link btn btn-sm py-0" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
					<span aria-hidden="true"><?= lang('Previous') ?></span>
				</a>
			</li>
		<?php endif; ?>

		<?php foreach($pager->links() as $link) : ?>
			<li <?= ( $link['active'] ) ? 'class="page-item pe-1 active"' : 'class="page-item pe-1"' ?>>
				<a class="page-link btn btn-sm py-0" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
			</li>
		<?php endforeach; ?>

		<?php if($pager->hasNextPage()) : ?>
			<li class="page-item ps-1">
				<a class="page-link btn btn-sm py-0" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
					<span aria-hidden="true"><?= lang('Next') ?></span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>