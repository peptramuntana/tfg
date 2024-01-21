<?php
require_once('config.php');

class Database
{

    static function checkLogin()
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "Select * from users where name=:name AND password=:password";
            $result = $db->prepare($sql);
            $name = htmlentities(addslashes($_POST["name"]));
            $password = htmlentities(addslashes($_POST["password"]));
            $result->bindValue(":name", $name);
            $result->bindValue(":password", $password);
            $result->execute();
            $counter = $result->rowCount();
            return $counter;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getUrlLang()
    {
        try {
            $url_tag = URL_LANG;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "SELECT * FROM langs WHERE tag =:url_tag";
            $consult = $db->prepare($sql);
            $consult->bindParam(':url_tag', $url_tag);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getLangs()
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "SELECT id, tag FROM langs";
            $consult = $db->prepare($sql);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getMenus()
    {
        try {
            $lang_id = SYSTEM_LANG_ID;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "SELECT name, url FROM menus WHERE lang =:lang_id";
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getLinks()
    {
        try {
            $lang_id = SYSTEM_LANG_ID;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "SELECT name, url FROM menus WHERE lang =:lang_id";
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_ASSOC);

            $links = array();
            foreach ($result as $row) {
                $links[$row['name']] = $row['url'];
            }
            return $links;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getTexts()
    {
        try {
            $lang_id = SYSTEM_LANG_ID;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "SELECT name, content FROM texts WHERE language_id =:lang_id";
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_ASSOC);

            $texts = array();
            foreach ($result as $row) {
                $texts[$row['name']] = $row['content'];
            }

            return $texts;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getView()
    {
        try {

            $url_lang = URL_LANG;
            $url_menu = URL_MENU;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            if (empty($url_menu)) {
                $sql = "
                SELECT
                    l.tag AS lang_tag, 
                    v.view AS view_name,
                    v.url AS view_url, 
                    m.url AS menu_url
                FROM views v
                LEFT JOIN menus m ON m.view = v.id
                LEFT JOIN langs l ON m.lang = l.id
                WHERE m.url IS NULL AND l.tag=:url_lang";
                $consult = $db->prepare($sql);
                $consult->bindParam(':url_lang', $url_lang);
            } else {
                $sql = "
                SELECT
                    l.tag AS lang_tag, 
                    v.view AS view_name,
                    v.url AS view_url, 
                    m.url AS menu_url
                FROM views v
                LEFT JOIN menus m ON m.view = v.id
                LEFT JOIN langs l ON m.lang = l.id
                WHERE m.url=:url_menu AND l.tag=:url_lang";
                $consult = $db->prepare($sql);
                $consult->bindParam(':url_menu', $url_menu);
                $consult->bindParam(':url_lang', $url_lang);
            }
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getProjects($active)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            if ($active === 1)
                $sql = "SELECT id FROM projects WHERE active = 1";
            else if ($active === 0)
                $sql = "SELECT id FROM projects";
            $consult = $db->prepare($sql);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function getProjectTexts($project_id, $active)
    {
        try {
            $lang_id = SYSTEM_LANG_ID;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            if ($active === 1) {
                $sql =
                    "
                SELECT t.name AS project_title, t.content AS project_description, t.language_id, p.active
                FROM texts t
                INNER JOIN textproject tp ON t.id = tp.textproject_text_id
                INNER JOIN projects p ON p.id = tp.textproject_project_id
                WHERE p.id =:project_id
                AND t.language_id=:lang_id
                AND p.active=1
                ";
            } else if ($active === 0) {
                $sql =
                    "
                SELECT t.name AS project_title, t.content AS project_description, t.language_id, p.active
                FROM texts t
                INNER JOIN textproject tp ON t.id = tp.textproject_text_id
                INNER JOIN projects p ON p.id = tp.textproject_project_id
                WHERE p.id =:project_id
                AND t.language_id =:lang_id
                ";
            }
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function updateProjectTexts($system_lang_id, $project_id, $project_title, $project_content)
    {
        try {
            $lang_id = $system_lang_id;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                UPDATE texts t
                INNER JOIN textproject tp ON t.id = tp.textproject_text_id
                INNER JOIN projects p ON p.id = tp.textproject_project_id
                SET t.name =:project_title,
                t.content =:project_content
                WHERE p.id =:project_id
                AND t.language_id =:lang_id
            ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->bindParam(':project_id', $project_id);
            $consult->bindParam(':project_title', $project_title);
            $consult->bindParam(':project_content', $project_content);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    static function getProjectSlider($project_id, $active)
    {
        try {
            $lang_id = SYSTEM_LANG_ID;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            if ($active === 1) {
                $sql =
                    "
                SELECT DISTINCT pi.id as img_id, pi.url as img_url, pi.alt AS img_alt, pi.title AS img_title, pi.language_project
                FROM projects AS p
                JOIN gallery AS g ON g.project_id = p.id
                JOIN projectsimages AS pi ON pi.gallery_id = g.id
                WHERE pi.language_project=:lang_id AND p.id=:project_id AND pi.active = 1 AND p.active = 1
                ";
            } else if ($active === 0) {
                $sql =
                    "
                SELECT DISTINCT pi.id as img_id, pi.url as img_url, pi.alt AS img_alt, pi.title AS img_title, pi.language_project
                FROM projects AS p
                JOIN gallery AS g ON g.project_id = p.id
                JOIN projectsimages AS pi ON pi.gallery_id = g.id
                WHERE pi.language_project=:lang_id AND p.id=:project_id
                ";
            }
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }


    static function updateImageProject($system_lang_id, $project_id, $image_id, $image_url, $image_title, $image_alt)
    {
        try {
            $lang_id = $system_lang_id;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                UPDATE projects as p
                JOIN gallery AS g ON g.project_id = p.id
                JOIN projectsimages AS pi ON pi.gallery_id = g.id
                SET pi.url =:image_url,
                pi.alt=:image_alt,
                pi.title=:image_title
                WHERE pi.language_project=:lang_id and p.id=:project_id and pi.id=:image_id
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->bindParam(':project_id', $project_id);
            $consult->bindParam(':image_id', $image_id);
            $consult->bindParam(':image_url', $image_url);
            $consult->bindParam(':image_title', $image_title);
            $consult->bindParam(':image_alt', $image_alt);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function hideProject($system_lang_id, $project_id, $switched_state)
    {
        try {
            $lang_id = $system_lang_id;
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                UPDATE projects as p
                SET p.active =:switched_state
                WHERE p.id=:project_id
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':project_id', $project_id);
            $consult->bindParam(':switched_state', $switched_state);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function deleteProjectTexts($project_id)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql = "
            DELETE t
            FROM texts t
            INNER JOIN textproject tp ON t.id = tp.textproject_text_id
            WHERE tp.textproject_project_id = :project_id;
            ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            return;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
    static function deleteProjectSlider($project_id)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                    DELETE pi, g, p
                    FROM projectsimages pi
                    INNER JOIN gallery g ON pi.gallery_id = g.id
                    INNER JOIN projects p ON g.project_id = p.id
                    WHERE p.id = :project_id;
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function deleteGallery($project_id)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                    DELETE
                    FROM gallery
                    WHERE id = :project_id
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function deleteProject($project_id)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                    DELETE
                    FROM projects
                    WHERE id = :project_id
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function createProject($name, $active)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                INSERT INTO projects (name, active)
                VALUES (:name, :active);
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':name', $name);
            $consult->bindParam(':active', $active);
            $consult->execute();
            $sql =
                "
                SELECT LAST_INSERT_ID() AS project_id;
            ";
            $last_insert = $db->query($sql);
            $result = $last_insert->fetch(PDO::FETCH_OBJ);
            return $result->project_id;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function createProjectTexts($lang_id, $project_id, $project_title, $project_content)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");

            // Insert a new text
            $sql_texts = "
            INSERT INTO texts (name, content, language_id)
            VALUES (:text_name, :text_content, :lang_id)
            ";
            $consult = $db->prepare($sql_texts);
            $consult->bindParam(':text_name', $project_title);
            $consult->bindParam(':text_content', $project_content);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->execute();
            $text_id = $db->lastInsertId(); // Get the ID of the newly created text

            // Create a new relationship between the text and project in the textproject table
            $sql_textproject = "
            INSERT INTO textproject (textproject_text_id, textproject_project_id)
            VALUES (:text_id, :project_id)
            ";
            $junction_table = $db->prepare($sql_textproject);
            $junction_table->bindParam(':text_id', $text_id);
            $junction_table->bindParam(':project_id', $project_id);
            $junction_table->execute();

            $result = $db->lastInsertId(); // Get the ID of the newly created junction table 
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function createGallery($name, $project_id)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");

            // Insert a new text
            $sql_texts =
                "
                INSERT INTO gallery (name, project_id)
                VALUES (:name, :project_id)
            ";
            $consult = $db->prepare($sql_texts);
            $consult->bindParam(':name', $name);
            $consult->bindParam(':project_id', $project_id);
            $consult->execute();
            $sql =
                "
                SELECT LAST_INSERT_ID() AS gallery_id;
            ";
            $last_insert = $db->query($sql);
            $result = $last_insert->fetch(PDO::FETCH_OBJ);
            return $result->gallery_id;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    static function createImage($lang_id, $gallery_id, $url, $alt, $title, $active)
    {
        try {
            $db = Config::db();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET UTF8");
            $sql =
                "
                    INSERT INTO projectsimages (language_project, gallery_id, alt, title, url, active)
                    VALUES (:lang_id, :gallery_id, :alt, :title, :url, :active);
                ";
            $consult = $db->prepare($sql);
            $consult->bindParam(':lang_id', $lang_id);
            $consult->bindParam(':gallery_id', $gallery_id);
            $consult->bindParam(':url', $url);
            $consult->bindParam(':alt', $alt);
            $consult->bindParam(':title', $title);
            $consult->bindParam(':active', $active);
            $consult->execute();
            $result = $consult->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
