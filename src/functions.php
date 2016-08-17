<?php

function base_uri($path)
{
    return getenv(BASE_URI).$path;
}