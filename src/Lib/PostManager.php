<?php

namespace Lib;
use DomDocument;
use DOMXPath;

class PostManager
{
	function validateInput ($allowed_tags = [], $allowed_attrs = [], $html_val) {
		$dom = new DomDocument;
		$html_val = '<meta http-equiv="content-type" content="text/html; charset=utf-8"/><body>'.$html_val.'</body>';
		$res = $dom->loadHTML($html_val);

		$xpath = new DOMXPath($dom);
		foreach ($xpath->query("//body//*") as $e) {
			if (!in_array($e->nodeName, $allowed_tags)) {
				$e->parentNode->removeChild($e);
				continue;
			}

			foreach ($e->attributes as $attr) {
				if (!in_array($attr->name, $allowed_attrs)) {
					$e->removeAttribute($attr->name);
			    } else if ($attr->name == 'href') {
			        if (preg_match('/^\s*javascript:/i', $e->getAttribute($attr->name))) {
			             $e->setAttribute($attr->name, '');
			        }
			     }
			}
		}


		$html = '';
		$elements = $dom->getElementsByTagName('body');
		$elements = $elements->item(0);
		if ($elements) {
			$elements = $elements->childNodes;
			foreach ($elements as $element) {
			    $html .= $dom->saveHTML($element);
			}
		}

		$html = trim($html);

		return $html;
	}
}




	
