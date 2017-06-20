function initree_course( object, url_lv1, url_lv4, iconUrl1, iconUrl3 ) {

    object.jstree({

        "core" : {
            "animation":0,
            "check_callback" : true,
            'force_text' : true,
            "themes" : {
                "variant" : "large",
                "stripes" : true
            },
            "data":{
                'url' : function (node) {
                    return node.id === '#' ? url_lv1+'?tree_side=course_annual'+'&department_id='+department_id+'&academic_year_id='+academic_year_id+'&grade_id='+grade_id+'&degree_id='+degree_id+'&department_option_id='+department_option_id + '&semester_id='+semester_id: url_lv4+'?academic_year_id='+academic_year_id+'&grade_id='+grade_id+'&degree_id='+degree_id+'&department_option_id='+department_option_id+ '&semester_id='+semester_id;

                },
                'data' : function (node) {
//                           alert(object.jstree("is_loaded"));

                    return {
                        'id' : node.id,
                        'class' : node.class
                    };
                },
            }
        },
        "checkbox" : {
            "keep_selected_style" : false
        },
        "types" : {
            "#" : { "max_depth" : 2, "valid_children" : ["department","course"] },
            "department" : {
                "icon" : iconUrl1,
                "valid_children" : ["course"]
            },
            "course" :{
                "icon" : iconUrl3,
                "valid_children" : []
            }
        },
        "plugins" : [
            'checkbox', "contextmenu", "search", "state","types", "sort"
        ]
    }).on('open_node.jstree', function (e, data) {
        var folderId = data.node.original.id;
        var moduleId = data.node.original.moduleId;

        initdiv(data.node);
    });
}