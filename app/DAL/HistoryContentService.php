<?php
require __DIR__ . '/../DAO/HistoryContentDAO.php';

class HistoryContentService {
    public function getContentByName($name) {
        $dao = new HistoryContentDAO();
        $content = $dao->getContentByName($name);
        return $content;
    }

}
?>