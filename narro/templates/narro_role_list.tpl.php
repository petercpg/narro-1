<?php
    /**
     * Narro is an application that allows online software translation and maintenance.
     * Copyright (C) 2008 Alexandru Szasz <alexxed@gmail.com>
     * http://code.google.com/p/narro/
     *
     * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public
     * License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any
     * later version.
     *
     * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the
     * implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
     * more details.
     *
     * You should have received a copy of the GNU General Public License along with this program; if not, write to the
     * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
     */

    $strPageTitle = t('Role list');


    require('includes/header.inc.php')
?>

    <?php $this->RenderBegin() ?>
        <?php $this->pnlHeader->Render() ?>
        <h3><?php echo t('Role list') ?></h3>
        <p><?php echo t('Here you can manage the roles used on this website.'); ?></p>
        <table width="100%">
        <tr>
        <td width="50%" valign="top">
        <div class="title_action"><?php echo t('Roles list'); ?></div>
        <br class="item_divider" />
        <?php $this->dtgNarroRole->Render() ?>
        </td>
        <td width="50%" valign="top">
        <?php
            switch(QApplication::QueryString('view')) {
                case 'permission':
                        $this->pnlRolePermissions->Render();
                        break;
                case 'user':
                        $this->pnlRoleUsers->Render();
                        break;
                default:
            }
        ?>
        </td>
        </tr>
        </table>
    <?php $this->RenderEnd() ?>

<?php require('includes/footer.inc.php'); ?>
