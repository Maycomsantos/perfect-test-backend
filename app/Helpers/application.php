<?php

use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Base Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('is_super_admin')) {

    /**
     * Verifica se o usuário é Super Admin (Grupo de Devs).
     *
     * @return boolean
     */
    function is_super_admin()
    {
        return auth()->check() && auth()->user()->isSuperAdmin();
    }
}

if (! function_exists('is_admin')) {

    /**
     * Verifica se o usuário é Admin (Grupo de Administradores).
     *
     * @return boolean
     */
    function is_admin()
    {
        return auth()->check() && auth()->user()->isAdmin();
    }
}

if (! function_exists('check_user_access')) {

    /**
     * Redireciona para a página de Not Found caso o usuário logado não seja
     * Super Admin e esteja tentanto acessar usuários com perfil Super Admin.
     *
     * @param $user
     * @return mixed
     */
    function check_user_access($user)
    {
        return abort_if(! is_super_admin() && $user->isSuperAdmin(), 404);
    }
}

if (! function_exists('left_zero')) {

    /**
     * Formata string colocando zeros à esquerda.
     *
     * @param string $value
     * @param int $qty
     * @return string
     */
    function left_zero($value, $qty = 11)
    {
        return str_pad($value, $qty, 0, STR_PAD_LEFT);
    }
}

/*
|--------------------------------------------------------------------------
| Array Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('array_obj')) {

    /**
     * Converte um array em objeto.
     *
     * @param array $array
     * @return object
     */
    function array_obj($array)
    {
        return json_decode(json_encode($array));
    }
}

/*
|--------------------------------------------------------------------------
| Route Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('route_is')) {

    /**
     * Verifica se a rota atual está contida em uma lista de rotas.
     *
     * @param mixed $names
     * @return boolean
     */
    function route_is($names)
    {
        return in_array(\Route::current()->getName(), Arr::wrap($names));
    }
}

 /**
  * Retorna url do diretório público.
  *
  * @param string $path
  * @return string
  */
if (! function_exists('public_path')) {

    function public_path(string $path = '')
    {
        return asset('public/' . $path);
    }
}

if (! function_exists('uploads_path')) {

    /**
     * Retorna url do diretório de uploads.
     *
     * @param string $path
     * @return string
     */
    function uploads_path(string $path = '')
    {
        return asset('storage/' . $path);
    }
}

if (! function_exists('public_storage_path')) {

   /**
     * Retorna url do diretório público do storage.
     *
     * @param string $path
     * @return string
     */
    function public_storage_path(string $path = '')
    {
        return public_path('storage/' . $path);
    }
}

/*
|--------------------------------------------------------------------------
| Date Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('date_db')) {

    /**
     * Converte data para o formato do banco da dados (YYYY-MM-DD).
     *
     * @param string $date
     * @return string
     */
    function date_db($date)
    {
        return implode('-', array_reverse(explode('/', $date)));
    }
}

if (! function_exists('datetime_db')) {

    /**
     * Converte data para o formato do banco da dados (YYYY-MM-DD H:I:S).
     *
     * @param string $datetime
     * @return string
     */
    function datetime_db($datetime)
    {
        if (! isset($datetime)) {
            return null;
        }

        [$date, $time] = explode(' ', $datetime);
        return date_db($date) . ' ' . $time;
    }
}

if (! function_exists('start_datetime_db')) {

    /**
     * Monta formato de data inicial para salvar no banco de dados.
     *
     * @param string $date
     * @return string
     */
    function start_datetime_db($date)
    {
        return date_db($date) . ' 00:00:00';
    }
}

if (! function_exists('end_datetime_db')) {

    /**
     * Monta formato de data final para salvar no banco de dados.
     *
     * @param string $date
     * @return string
     */
    function final_datetime_db($date)
    {
        return date_db($date) . ' 23:59:59';
    }
}

/*
|--------------------------------------------------------------------------
| Mask Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('cnpj_db')) {

    /**
     * Formata campo CNPJ para salvar no banco de dados.
     *
     * @param string $value
     * @return string
     */
    function cnpj_db($value)
    {
        return left_zero(str_replace(['.', '-', '/'], '', $value), 14);
    }
}

if (! function_exists('cnpj_view')) {

   /**
     * Formata campo CNPJ para exibir nas view.
     *
     * @param string $value
     * @return string
     */
    function cnpj_view($value)
    {
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $value);
    }
}

if (! function_exists('phone_db')) {

    /**
     * Formata campo de telefone para salvar no banco de dados.
     *
     * @param string $value
     * @return string
     */
    function phone_db($value)
    {
        return str_replace(['(', ')', '-', ' '], [''], $value);
    }
}

if (! function_exists('phone_view')) {

   /**
     * Formata campo de telefone para exibir nas views.
     *
     * @param string $value
     * @return string
     */
    function phone_view($value)
    {
        if (strlen($value) == 10) {
            return preg_replace("/(\d{2})(\d{4})/", "(\$1) \$2-\$3", $value);
        }

        return preg_replace("/(\d{2})(\d{1})(\d{4})/", "(\$1) \$2 \$3-\$4", $value);
    }
}

/*
|--------------------------------------------------------------------------
| Validation Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('valid_phone')) {

    /**
     * validador do campo telefone.
     *
     * @param string $number
     * @return string
     */
    function valid_phone($number)
    {
        return preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/', $number);
    }
}

/*
|--------------------------------------------------------------------------
| Template Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('hashId')) {

    /**
     * Formata campo id para exibir nas views.
     *
     * @param string $number
     * @return string
     */
    function hashId($number)
    {
        return '#' . left_zero($number, 6);
    }
}

if (! function_exists('text_status')) {

    /**
     * Exibe icone relativo ao status do registro.
     *
     * @param int $status
     * @return string
     */
    function text_status(int $status)
    {
        return $status ? 'Ativo' : 'Inativo';
    }
}

if (! function_exists('icon_status')) {

    /**
     * Exibe icone relativo ao status do registro.
     *
     * @param int $status
     * @return string
     */
    function icon_status(int $status)
    {
        $icon = $status == 1
            ? ['icon' => 'check', 'color' => 'text-success']
            : ['icon' => 'times', 'color' => 'text-danger'];

        echo vsprintf('<i class="fa fa-%s %s"></i>', $icon);
    }
}

if (! function_exists('set_selected')) {

    /**
     * Preenche propriedade selected nas tags de select.
     *
     * @param string $field
     * @param string $value
     * @return string
     */
    function set_selected($field, $value)
    {
        return $field == $value ? 'selected' : '';
    }
}

if (! function_exists('set_checked')) {

    /**
     * Preenche propriedade checked nas tags de checkbox.
     *
     * @param string $field
     * @param string $value
     * @return string
     */
    function set_checked($field, $value)
    {
        return $field == $value ? 'checked' : '';
    }
}

if (! function_exists('active_tab')) {

    /**
     * Preenche class active nas tabs do sistema baseando-se na query string da url.
     *
     * @param string $name
     * @return string
     */
    function active_tab($name)
    {
        return request()->tab == $name ? 'active' : '';
    }
}

/*
|--------------------------------------------------------------------------
| Data Helpers
|--------------------------------------------------------------------------
*/

if (! function_exists('protocol_type')) {

    /**
     * Retorna tipos de Protocolo.
     *
     * @param int $type
     * @return mixed
     */
    function protocol_type(int $type)
    {
        $types = [
            1 => 'ENTREGA',
            2 => 'RECEBIMENTO'
        ];

        return $types[$type];
    }
}

function status_type(int $status_type)
{
    $status_types = [
        1 => 'Aprovado',
        2 => 'Cancelado',
        3 => 'Devolvido'
    ];

    return $status_types[$status_type];
}



if (! function_exists('money_db')) {

    function money_db($value)
    {
        return str_replace(['.', ','], ['', '.'], $value);
    }
}

if (! function_exists('money_view')) {

    function money_view($value)
    {
        return $value ? number_format($value, 2, ',', '.') : '0,00';
    }
}

/**
 *
 */
if (! function_exists('document_db')) {

    function document_db($value = null)
    {
        $document = preg_replace("/\D/", '', $value);
        $lenght = strlen($document) <= 11 ?: 14;

        return $value ? left_zero($document, $lenght) : null;
    }
}

/**
 *
 */
if (! function_exists('document_view')) {

    function document_view($value)
    {
        $document = preg_replace("/\D/", '', $value);

        if (strlen($document) == 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $document);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $document);
    }
}
