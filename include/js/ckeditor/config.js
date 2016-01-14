/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 * https://highlightjs.org/static/test.html
 */
CKEDITOR.addStylesSet('default', [
    /* start of added options */
    {name: 'HTML', element: 'pre', attributes: {class: 'lang-html'}},
    {name: 'CSS', element: 'pre', attributes: {class: 'lang-css'}},
    {name: 'JAVASCRIPT', element: 'pre', attributes: {class: 'lang-java'}},
    {name: 'PHP', element: 'pre', attributes: {class: 'lang-java'}},
    {name: 'JAVA', element: 'pre', attributes: {class: 'lang-java'}},
    {name: 'PYTHON', element: 'pre', attributes: {class: 'lang-java'}},
    {name: 'C', element: 'pre', attributes: {class: 'lang-basic'}},
    {name: 'SQL', element: 'pre', attributes: {class: 'lang-sql'}}
    /* end of added options */
]);
CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    config.extraPlugins = 'youtube';
    config.height = 400;

    config.toolbar = [
        '/',
        {name: 'basicstyles', groups: ['basicstyles', 'cleanup'], items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']},
        {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'], items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']},
        {name: 'insert', items: ['Code', 'Link', 'Unlink', 'Youtube', 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak']},
        '/',
        {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
        {name: 'colors', items: ['TextColor', 'BGColor']},
        {name: 'tools', items: ['Maximize', 'ShowBlocks']},
        {name: 'others', items: ['-']},
        {name: 'clipboard', groups: ['clipboard', 'undo'], items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']}
    ];
};