$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.fn.addSubMenu = (parentID, addType='parent') => {
        const parentNumber = addType == 'parent' ? parentID.replace('#parent-menu-', '') :
                             parentID.replace('#child-menu-', ''),
              countChildMenu = $(parentID).children('blockquote').children('.child-menu').length + 1,
              newChildMenuID = `child-menu-${parentNumber}-${countChildMenu}`;
              levelCount = addType == 'parent' ? 2 : $(parentID).parents('.child-menu').length + 3,
              htmlChildMenu = `<div class="child-menu p-3 border" id="${newChildMenuID}">
                <blockquote class="blockquote mb-0 sortable">
                    <h5>
                        <div class="row">
                            <div class="col-md-10">
                                Level ${levelCount}
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-red btn-sm btn-block btn-rounded px-0 py-1"
                                        onclick="$(this).deleteMenu('#${newChildMenuID}');">
                                    <i class="fas fa-minus-circle"></i> Delete
                                </button>
                            </div>
                        </div>
                    </h5>
                    <div class="md-form form-sm">
                        <input type="text" id="submenu-name-${parentNumber}-${countChildMenu}-1"
                               class="submenu-name form-control form-control-sm" required>
                        <label for="submenu-name-${parentNumber}-${countChildMenu}-1">
                            Sub-menu Name <span class="red-text">*</span>
                        </label>
                    </div>
                    <div class="pb-2 toggle-submenu-container">
                        <!-- Default switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="toggle-submenu custom-control-input" id="toggle-submenu-${parentNumber}-${countChildMenu}-1"
                                   onclick="$(this).toggleSubMenu('#toggle-submenu-${parentNumber}-${countChildMenu}-1');">
                            <label class="custom-control-label" for="toggle-submenu-${parentNumber}-${countChildMenu}-1">
                                Toggle Sub-menu
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="child-menu p-3 border" id="${newChildMenuID}-1">
                        <div class="pb-2 toggle-submenu-container">
                            <!-- Default switch -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="toggle-submenu-link custom-control-input" id="toggle-submenu-link-${parentNumber}-${countChildMenu}-1-1"
                                       onclick="$(this).toggleLinkURL('#toggle-submenu-link-${parentNumber}-${countChildMenu}-1-1');">
                                <label class="custom-control-label" for="toggle-submenu-link-${parentNumber}-${countChildMenu}-1-1">
                                    Toggle Link/URL
                                </label>
                            </div>
                        </div>
                        <div id="file-url-container-${parentNumber}-${countChildMenu}-1-1">
                            <div class="md-form form-sm">
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose file</span>
                                        <input type="file" class="submenu-attachment" name="files[]"
                                               accept="application/pdf" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload a file...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </blockquote>
            </div>`;

        $(parentID).children('blockquote').children('.child-menu').last().after(htmlChildMenu);
        initSortableElements();
    }

    $.fn.toggleSubMenu = (toogleSubmenuID) => {
        const submenuNumber = toogleSubmenuID.replace('#toggle-submenu-', ''),
              submenuID = '#child-menu-' + submenuNumber.slice(0, -2),
              targetSubmenuID = '#child-menu-' + submenuNumber,
              addSubmenuID = '#add-submenu-' + submenuNumber,
              levelCount = $(submenuID).parents('.child-menu').length + 2,
              newLevelCount = levelCount + 1,
              newChildMenuID = `${targetSubmenuID}-1`;
        let htmlSubmenu = '',
            htmlSubmenuButton = `<button type="button" class="btn btn-outline-info btn-sm btn-block mt-2"
                    id="${addSubmenuID.replace('#', '')}" onclick="$(this).addSubMenu('${submenuID}', 'child');">
                + Add Level ${newLevelCount} Menu
            </button>`;

        if (newLevelCount < 5) {
            if ($(toogleSubmenuID).is(':checked')) {
                htmlSubmenu = `<blockquote class="blockquote mb-0 sortable">
                    <h5>
                        <div class="row">
                            <div class="col-md-10">
                                Level ${newLevelCount}
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-red btn-sm btn-block btn-rounded px-0 py-1"
                                        onclick="$(this).deleteMenu('${targetSubmenuID}');">
                                    <i class="fas fa-minus-circle"></i> Delete
                                </button>
                            </div>
                        </div>
                    </h5>
                    <div class="md-form form-sm">
                        <input type="text" id="submenu-name-${submenuNumber}-1" class="submenu-name form-control form-control-sm" required>
                        <label for="submenu-name-${submenuNumber}-1">
                            Sub-menu Name <span class="red-text">*</span>
                        </label>
                    </div>
                    <div class="pb-2 toggle-submenu-container">
                        <!-- Default switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="toggle-submenu custom-control-input" id="toggle-submenu-${submenuNumber}-1"
                                   onclick="$(this).toggleSubMenu('#toggle-submenu-${submenuNumber}-1');">
                            <label class="custom-control-label" for="toggle-submenu-${submenuNumber}-1">
                                Toggle Sub-menu
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="child-menu p-3 border" id="${newChildMenuID.replace('#', '')}">
                        <div class="pb-2 toggle-submenu-container">
                            <!-- Default switch -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="toggle-submenu-link custom-control-input" id="toggle-submenu-link-${submenuNumber}-1-1"
                                    onclick="$(this).toggleLinkURL('#toggle-submenu-link-${submenuNumber}-1-1');">
                                <label class="custom-control-label" for="toggle-submenu-link-${submenuNumber}-1-1">
                                    Toggle Link/URL
                                </label>
                            </div>
                        </div>
                        <div id="file-url-container-${submenuNumber}-1-1">
                            <div class="md-form form-sm">
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose file</span>
                                        <input type="file" class="submenu-attachment" name="files[]"
                                               accept="application/pdf" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload a file...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </blockquote>`;
                $(targetSubmenuID).after(htmlSubmenuButton);
            } else {
                htmlSubmenu = `<div class="pb-2 toggle-submenu-container">
                    <!-- Default switch -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="toggle-submenu-link custom-control-input" id="toggle-submenu-link-${submenuNumber}-1"
                            onclick="$(this).toggleLinkURL('#toggle-submenu-link-${submenuNumber}-1');">
                        <label class="custom-control-label" for="toggle-submenu-link-${submenuNumber}-1">
                            Toggle Link/URL
                        </label>
                    </div>
                </div>
                <div id="file-url-container-${submenuNumber}-1">
                    <div class="md-form form-sm">
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Choose file</span>
                                <input type="file" class="submenu-attachment" name="files[]"
                                       accept="application/pdf" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload a file...">
                            </div>
                        </div>
                    </div>
                </div>`;
                $(addSubmenuID).remove();
            }

            $(targetSubmenuID).html(htmlSubmenu);
        } else {
            alert('The maximum level is 4.');
            $(toogleSubmenuID).prop("checked", false);
        }
    }

    $.fn.toggleLinkURL = (linkID) => {
        const linkNumber = linkID.replace('#toggle-submenu-link-', '')
              fileLinkID = `#file-url-container-${linkNumber}`;
        let htmlFile = '';

        if ($(linkID).is(':checked')) {
            htmlFile = `<div class="md-form form-sm">
                <input type="text" id="fileurl-${linkNumber}" class="fileurl form-control form-control-sm" required>
                <label for="fileurl-${linkNumber}">
                    Enter the URL of the file <span class="red-text">*</span>
                </label>
            </div>`;
        } else {
            htmlFile = `<div class="md-form form-sm">
                <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                        <span>Choose file</span>
                        <input type="file" class="submenu-attachment" name="files[]"
                               accept="application/pdf" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload a file...">
                    </div>
                </div>
            </div>`;
        }

        $(fileLinkID).html(htmlFile);
    }

    function empty(data) {
        let count = 0;

        if (typeof(data) == 'number' || typeof(data) == 'boolean') {
            return false;
        }
        if (typeof(data) == 'undefined' || data === null) {
            return true;
        }
        if (typeof(data.length) != 'undefined') {
            return data.length == 0;
        }


        for(let i in data) {
            if(data.hasOwnProperty(i)) {
                count ++;
            }
        }
        return count == 0;
    }

    $.fn.deleteMenu = (menuID) => {
        const menuCount = $(menuID).siblings('.child-menu').length ?
                          $(menuID).siblings('.child-menu').length :
                          $(menuID).siblings('.parent-menu').length;

        if (confirm('Are you sure you want to delete this menu?')) {
            if (menuCount) {
                $(menuID).fadeOut(300, function() {
                    $(this).remove();
                });
            } else {
                alert('Cannot delete all the menu in this container.');
            }
        }
    }

    function hasEmptyInput() {
        let errorCount = 0;

        $('input').each(function() {
            if ($(this).prop('required')) {
                if (empty($(this).val())) {
                    errorCount++;
                }
            }
        });

        return errorCount;
    }

    function procGetParentData(parentID) {
        const menuName = $(parentID).find('.name').val(),
              menuDescription = $(parentID).find('.description').val(),
              menuPhoto = $(parentID).find('.photo')[0].files[0];
        let jsonData = {};

        jsonData['name'] = menuName;
        jsonData['description'] = menuDescription;
        jsonData['photo'] = menuPhoto ? menuPhoto.name : null;
        jsonData['sub_menu'] = [];

        $(parentID).children('blockquote').children('.child-menu').each(function(lvl2Ctr, lvl2) {
            const menuNameL2 = $(lvl2).find('.submenu-name').val(),
                  togSubMenuL2 = $(lvl2).find('.toggle-submenu').is(':checked');
            let togSubMenuLinkL2 = false,
                jsonDataL2 = {};

            jsonDataL2['name'] = menuNameL2;
            jsonDataL2['has_sub_menu'] = togSubMenuL2;
            jsonDataL2['sub_menu'] = [];

            if (togSubMenuL2) {
                $(lvl2).children('blockquote').children('.child-menu').each(function(lvl3Ctr, lvl3) {
                    const menuNameL3 = $(lvl3).find('.submenu-name').val(),
                          togSubMenuL3 = $(lvl3).find('.toggle-submenu').is(':checked');
                    let togSubMenuLinkL3 = false,
                        jsonDataL3 = {};

                    jsonDataL3['name'] = menuNameL3;
                    jsonDataL3['has_sub_menu'] = togSubMenuL3;
                    jsonDataL3['sub_menu'] = [];

                    if (togSubMenuL3) {
                        $(lvl3).children('blockquote').children('.child-menu').each(function(lvl4Ctr, lvl4) {
                            const menuNameL4 = $(lvl4).find('.submenu-name').val(),
                                  togSubMenuL4 = false;
                            let togSubMenuLinkL4 = $(lvl4).find('.toggle-submenu-link').is(':checked'),
                                jsonDataL4 = {};

                            jsonDataL4['name'] = menuNameL4;
                            jsonDataL4['has_sub_menu'] = togSubMenuL4;
                            jsonDataL4['has_file_link'] = togSubMenuLinkL4;

                            if (togSubMenuLinkL4) {
                                jsonDataL4['file_link'] = $(lvl4).find('.fileurl').val();
                            } else {
                                const fileAttachment = $(lvl4).find('.submenu-attachment')[0].files[0],
                                      oldPath = $(lvl4).find('.old-file-path').val() ?
                                              $(lvl4).find('.old-file-path').val() : null;

                                jsonDataL4['file_link'] = fileAttachment ?
                                                          $(lvl4).find('.submenu-attachment')[0].files[0].name : null;
                                jsonDataL4['old_path'] = oldPath;
                            }

                            jsonDataL3['sub_menu'].push(jsonDataL4);
                        });
                    } else {
                        togSubMenuLinkL3 = $(lvl3).find('.toggle-submenu-link').is(':checked');
                        jsonDataL3['has_file_link'] = togSubMenuLinkL3;

                        if (togSubMenuLinkL3) {
                            jsonDataL3['file_link'] = $(lvl3).find('.fileurl').val();
                        } else {
                            const fileAttachment = $(lvl3).find('.submenu-attachment')[0].files[0],
                                  oldPath = $(lvl3).find('.old-file-path').val() ?
                                            $(lvl3).find('.old-file-path').val() : null;

                            jsonDataL3['file_link'] = fileAttachment ?
                                                      $(lvl3).find('.submenu-attachment')[0].files[0].name : null;
                            jsonDataL3['old_path'] = oldPath;
                        }
                    }

                    jsonDataL2['sub_menu'].push(jsonDataL3);
                });
            } else {
                togSubMenuLinkL2 = $(lvl2).find('.toggle-submenu-link').is(':checked');
                jsonDataL2['has_file_link'] = togSubMenuLinkL2;

                if (togSubMenuLinkL2) {
                    jsonDataL2['file_link'] = $(lvl2).find('.fileurl').val();
                } else {
                    const fileAttachment = $(lvl2).find('.submenu-attachment')[0].files[0],
                          oldPath = $(lvl2).find('.old-file-path').val() ?
                                    $(lvl2).find('.old-file-path').val() : null;

                    jsonDataL2['file_link'] = fileAttachment ?
                                              $(lvl2).find('.submenu-attachment')[0].files[0].name : null;
                    jsonDataL2['old_path'] = oldPath;
                }
            }

            jsonData['sub_menu'].push(jsonDataL2);
        });

        return JSON.stringify(jsonData);
    }

    $("#form-data").submit(function(e) {
        if (!hasEmptyInput()) {
            $('.parent-menu').each(function() {
                const parentID = '#' + $(this)[0].id,
                      jsonData = procGetParentData(parentID);
                $('#input-sub-menus').val(jsonData);
            });
        } else {
            alert('Fill-up all the required field/s.');
            e.preventDefault();
        }
    });

    /*
    $.fn.submitData = () => {
        if (!hasEmptyInput()) {
            $('.parent-menu').each(function() {
                const parentID = '#' + $(this)[0].id,
                      jsonData = procGetParentData(parentID);
                $('#input-sub-menus').val(jsonData);
                console.log(jsonData);
                //e.preventDefault();
            });
        } else {
            alert('Fill-up all the required field/s.');
            e.preventDefault();
        }
    }*/

    function initSortableElements() {
        $(".sortable").sortable({
            cursor: "move",
            opacity: 0.5,
            scroll: false,
            stop: function() {
                const data = $(this).sortable('toArray');
                $('#order').val(data);
                console.log(data);
            }
        });
        $(".sortable").disableSelection();
    }

    initSortableElements();
});
