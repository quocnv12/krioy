/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

};

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = 'admin-template/assets/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'admin-template/assets/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'admin-template/assets/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'admin-template/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'admin-template/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'admin-template/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};


