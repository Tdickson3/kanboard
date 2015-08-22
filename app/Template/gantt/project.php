<section id="main">
    <div class="page-header">
        <ul>
            <li>
            <span class="dropdown">
                <span>
                    <i class="fa fa-caret-down"></i> <a href="#" class="dropdown-menu"><?= t('Actions') ?></a>
                    <ul>
                        <?= $this->render('project/dropdown', array('project' => $project)) ?>
                    </ul>
                </span>
            </span>
            </li>
            <li>
                <i class="fa fa-th fa-fw"></i>
                <?= $this->url->link(t('Back to the board'), 'board', 'show', array('project_id' => $project['id'])) ?>
            </li>
        </ul>
        <ul class="views toolbar">
            <li <?= $sorting === 'board' ? 'class="active"' : '' ?>>
                <i class="fa fa-sort-numeric-asc fa-fw"></i>
                <?= $this->url->link(t('Sort by position'), 'gantt', 'project', array('project_id' => $project['id'], 'sorting' => 'board')) ?>
            </li>
            <li <?= $sorting === 'date' ? 'class="active"' : '' ?>>
                <i class="fa fa-sort-amount-asc fa-fw"></i>
                <?= $this->url->link(t('Sort by date'), 'gantt', 'project', array('project_id' => $project['id'], 'sorting' => 'date')) ?>
            </li>
            <li>
                <i class="fa fa-plus fa-fw"></i>
                <?= $this->url->link(t('Add task'), 'gantt', 'task', array('project_id' => $project['id']), false, 'popover') ?>
            </li>
        </ul>
    </div>

    <?php if (! empty($tasks)): ?>
        <div
            id="gantt-chart"
            data-records='<?= json_encode($tasks, JSON_HEX_APOS) ?>'
            data-save-url="<?= $this->url->href('gantt', 'saveTaskDate', array('project_id' => $project['id'])) ?>"
            data-label-start-date="<?= t('Start date:') ?>"
            data-label-end-date="<?= t('Due date:') ?>"
            data-label-assignee="<?= t('Assignee:') ?>"
            data-label-not-defined="<?= t('There is no start date or due date for this task.') ?>"
        ></div>
        <p class="alert alert-info"><?= t('Moving or resizing a task will change the start and due date of the task.') ?></p>
    <?php else: ?>
        <p class="alert"><?= t('There is no task in your project.') ?></p>
    <?php endif ?>
</section>