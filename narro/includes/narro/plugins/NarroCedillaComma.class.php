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
    class NarroCedillaComma extends NarroPlugin {

        public function __construct() {
            parent::__construct();
            $this->strName = t('Cedill/Comma issue solver');
            QApplication::RegisterPreference('Cedilla or comma', 'option', 'Select wether you want to see s and t with comma or cedilla undernieth', 'cedilla', array('cedilla', 'comma'));
        }

        protected function ConvertToSedilla($strText) {
            $arrSedilla = array('ş', 'ţ', 'Ş', 'Ţ');
            $arrComma = array('ș', 'ț', 'Ș', 'Ț');
            return str_replace($arrComma, $arrSedilla, $strText);
        }

        protected function ConvertToComma($strText) {
            $arrSedilla = array('ş', 'ţ', 'Ş', 'Ţ');
            $arrComma = array('ș', 'ț', 'Ș', 'Ț');
            return str_replace($arrSedilla, $arrComma, $strText);
        }

        protected function Convert($strText) {
            $strPref = QApplication::$objUser->getPreferenceValueByName('Cedilla or comma');

            if ( $strPref  && $strPref == 'comma' )
                return $this->ConvertToComma($strText);
            else
                return $this->ConvertToSedilla($strText);
        }

        public function DisplaySuggestion($strSuggestion) {
            return $this->Convert($strSuggestion);
        }

        public function DisplayText($strText) {
            return $this->Convert($strText);
        }

        public function DisplayContext($strContext) {
            return $this->Convert($strContext);
        }

        public function DisplaySuggestionComment($strSuggestionComment) {
            return $this->Convert($strSuggestionComment);
        }

        public function DisplayContextComment($strContextComment) {
            return $this->Convert($strContextComment);
        }

        public function SaveSuggestion($strOriginal, $strTranslation, $strContext, $objFile, $objProject) {
            return array($strOriginal, $this->ConvertToComma($strTranslation), $strContext, $objFile, $objProject);
        }

        public function ExportSuggestion($strOriginal, $strTranslation, $strContext, $objFile, $objProject) {
            if (
                in_array(
                    $objFile->FileName,
                    array(
                        'custom.properties',
                        'mui.properties',
                        'override.properties',
                        'crashreporter.ini',
                        'installer.inc',
                        'updater.ini',
                    )
                )
            )
                return array($strOriginal, $this->ConvertToSedilla($strTranslation), $strContext, $objFile, $objProject);
            else
                return array($strOriginal, $this->ConvertToComma($strTranslation), $strContext, $objFile, $objProject);
        }

        public function SaveSuggestionComment($strSuggestionComment) {
            return $this->ConvertToComma($strSuggestionComment);
        }

        public function SaveContextComment($strOriginal, $strTranslation, $strContext, $strComment, $objFile, $objProject) {
            return array($strOriginal, $strTranslation, $strContext, $this->ConvertToComma($strComment), $objFile, $objProject);
        }
    }
?>