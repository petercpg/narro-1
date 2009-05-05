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
?>

<div class="section_title"><?php _t('Options')?></div>
<div class="section">
<label for="<?php echo $_CONTROL->lstExportSuggestionType->ControlId?>"><?php echo $_CONTROL->lstExportSuggestionType->Name?></label>
<?php $_CONTROL->lstExportSuggestionType->Render(); ?>
<br />
<?php $_CONTROL->chkCopyUnhandledFiles->Render(); ?>
<label for="<?php echo $_CONTROL->chkCopyUnhandledFiles->ControlId?>"><?php echo $_CONTROL->chkCopyUnhandledFiles->Name?></label>
<br />
</div>
<?php $_CONTROL->pnlLogViewer->Render() ?>
<?php $_CONTROL->btnExport->Render(); $_CONTROL->objExportProgress->Render(); $_CONTROL->lblExport->Render() ?>
