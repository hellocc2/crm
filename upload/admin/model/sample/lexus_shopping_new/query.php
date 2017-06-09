<?php 

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu' and `key` = 'pavmegamenu_module'";

$query['pavmegamenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavmegamenu_params' and `key` = 'params'";
$query['pavmegamenu'][] =  " 
INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES
(0, 0, 'pavmegamenu_params', 'pavmegamenu_params', '[{\"id\":43,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"submenu\":1,\"subwidth\":600,\"id\":2,\"align\":\"aligned-left\",\"group\":0,\"cols\":3,\"rows\":[{\"cols\":[{\"widgets\":\"wid-55\",\"colwidth\":6},{\"widgets\":\"wid-57\",\"colwidth\":6}]}]},{\"id\":19,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":23,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]},{\"id\":29,\"group\":0,\"cols\":1,\"submenu\":1,\"align\":\"aligned-left\",\"rows\":[{\"cols\":[{\"type\":\"menu\",\"colwidth\":12}]}]}]', 0);
";

$query['pavverticalmenu'][]  = "DELETE FROM `".DB_PREFIX ."setting` WHERE `code`='pavverticalmenu_params' and `key` = 'params'";
$query['pavverticalmenu'][] ="INSERT INTO `".DB_PREFIX ."setting` (`setting_id`, `store_id`, `code`, `key`, `value`, `serialized`) VALUES
(0, 0, 'pavverticalmenu_params', 'params', '[{\"id\":2,\"group\":0,\"cols\":3,\"subwidth\":600,\"submenu\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-60\",\"colwidth\":12}]}]},{\"submenu\":1,\"subwidth\":700,\"id\":5,\"group\":0,\"cols\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-20|wid-22|wid-58\",\"colwidth\":3},{\"widgets\":\"wid-21\",\"colwidth\":9,\"colclass\":\"\"}]}]},{\"id\":7,\"group\":0,\"cols\":1,\"subwidth\":700,\"submenu\":1,\"rows\":[{\"cols\":[{\"widgets\":\"wid-55\",\"colwidth\":4},{\"widgets\":\"wid-56\",\"colwidth\":4},{\"widgets\":\"wid-63\",\"colwidth\":4}]},{\"cols\":[{\"widgets\":\"wid-61\",\"colwidth\":12}]}]}]', 0);
";

$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout_route` (`layout_route_id`, `layout_id`, `store_id`, `route`) VALUES
(228, 14, 0, 'pavblog/%');

";
$query['pavblog'][] ="
INSERT INTO `".DB_PREFIX ."layout` (`layout_id`, `name`) VALUES
(14, 'Pav Blog');
";
?>