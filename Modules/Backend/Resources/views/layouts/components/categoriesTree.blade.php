@push('css')
    <style type="text/css">
        .category-tree {
            min-height:20px;
            padding:19px;
            margin-bottom:20px;
            background-color:#fbfbfb;
            border:1px solid #999;
            -webkit-border-radius:4px;
            -moz-border-radius:4px;
            border-radius:4px;
            -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
            -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
        }
        .category-tree li {
            list-style-type:none;
            margin:0;
            padding:10px 5px 0 5px;
            position:relative
        }
        .category-tree li::before, .category-tree li::after {
            content:'';
            left:-20px;
            position:absolute;
            right:auto
        }
        .category-tree li::before {
            border-left:1px solid #999;
            bottom:50px;
            height:100%;
            top:0;
            width:1px
        }
        .category-tree li::after {
            border-top:1px solid #999;
            height:20px;
            top:25px;
            width:25px
        }
        .category-tree li span {
            -moz-border-radius:5px;
            -webkit-border-radius:5px;
            border:1px solid #999;
            border-radius:5px;
            display:inline-block;
            padding:3px 8px;
            text-decoration:none
        }
        .category-tree li.parent_li>span {
            cursor:pointer
        }
        .category-tree>ul>li::before, .category-tree>ul>li::after {
            border:0
        }
        .category-tree li:last-child::before {
            height:30px
        }
        .category-tree li.parent_li>span:hover, .category-tree li.parent_li>span:hover+ul li span {
            background:#eee;
            border:1px solid #94a0b4;
            color:#000
        }
    </style>
@endpush
@push('js')
    <script type="text/javascript">
        $(function () {
            $('.category-tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Réduire cette branche');
            $('.category-tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Développer cette branche');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Réduire cette branche');
                }
                e.stopPropagation();
            });
        });
    </script>
@endpush