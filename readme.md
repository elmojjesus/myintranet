## Estes exemplos foram feitos pelo Zend Framework e deverão ser adaptados para o Laravel. Thanks ;D ##

[Modal-inline](#modal-inline)

[Modal-ajax geral](#modal-ajax)


Para usar o plugin e o script, você tem que ter uma rota que será acessada por ajax.

Então, em uma view como `/event/index`, o link abaixo já cria o modal para você:

```html
<a class="modal-ajax-link" data-mfp-src="/event/add">+</a>
```

Se você quiser mudar o título ou footer da página aqui mesmo, você também pode:

```html
<a class="modal-ajax-link" data-mfp-src="/event/add" data-title="Meu Título" data-footer="Meu Footer">+</a>
```

Outra forma de mudar o título da página é na sua própria modal.
`/event/add` poderia estar assim:

```html
<form
    method="PUT" <!-- o metodo que você escolher será usado (se estiver vazio, por padrão é GET) -->
    action="/event/add" <!-- a ação que você escolher será para onde os dados serão enviados por ajax,
                             mas se você deixar este campo vazio, os dados serão enviados para
                             o mesmo lugar da onde a modal foi chamada -->
>
    <h1 class="data-title">Meu Titulo</h1>

    <input type="text" name="name" class="error">

    <input type="file" name="file" class="error"> <!-- sim, isto funciona! -->

    <input type="submit"> <!-- isto é obrigatório -->

    <a class="mfp-close">cancelar</a> <!-- isto é desnecessário -->

    <div class="data-footer">Meu Footer</div>
</form>
```

Na parte do servidor, se o formulário não tiver erros, você pode dizer que a página deve recarregar.
Se o formulário tiver erros, você deve retorná-los.

Exemplo:
```php
    if ($form->isValid()) {
        // ...
        return new JsonModel(['success' => 'reload']);
    }
    return new JsonModel(['errors' => $form->getMessages()]);
```

Perceba que se não for retornado `errors`, a modal fecha sozinha.

Assim, o script automáticamente irá mostrar para o usuário as mensagens de erro:
```html
    <input type="text" name="name" class="error"> <!-- não se esqueça de por a class "error"! -->
    <ul>
        <li>Campo obrigatório.</li>
        <li>Você é muito noob.</li>
    </ul>
```

Perceba que todo `<ul>` e `<li>` que estiver abaixo de algo que tenha a classe `input-error` será apagado quando o usuário enviar o formulário.

Na parte do servidor, você também pedir para o script redirecionar o usuário para outra página ou mostrar notificações:
```php
    if ($form->isValid()) {
        // ...
        return new JsonModel(['redirect' => '/home']);
    }
    return new JsonModel(['notification' => 
        [
            "value" => "Noob", // opcional
            "type" => "error"  // opcional
            "options" => [     // opcional
                "autoHideDelay" => 10000
            ]
        ]
    ]);

    // ou

    return new JsonModel(['notification' => []]); // isto também funciona
                                                  // mas não terá nenhuma mensagem
                                                  // e mostrará a notificação no tipo padrão (success)

    // ou

    return new JsonModel(['notifications' =>
        [
            ["value" => "spam"],
            ["value" => "spam"],
            ["value" => "spam"],
        ]
    ]);
```




# Modal-inline
Também podemos criar a modal com o conteúdo que está na mesma página.
Para usá-la, primeiro definimos que parte do html queremos que seja uma modal:

Exemplo:
Queremos abrir algumas opções para complemento de um formulário:

```html
<a id="modal-open" class="btn bggr btn-icon-right">Abrir modal-inline</a>
<div id="popup-modal" class="modal-inline mfp-hide"> // Essas classes são muito importantes
     <div class="modal-header">
          <button title="Close (Esc)" type="button" class="mfp-close">
               <span aria-hidden="true">×</span>
               <span class="sr-only">Close</span>
          </button>
          <span class="white">Informações complementares</span> // Titulo da modal
     </div>
     <div class="modal-body">
          <div class="list-checkbox">
               <div class="eacr">
                    <input type="checkbox">
                    <label>Gosto de bala de goma</label>                        
               </div>
               <div class="eacr">
                    <input type="checkbox">
                    <label>Gosto de Alface</label>                        
               </div>
               <div class="eacr">
                    <input type="checkbox">
                    <label>Batata doce e frango!</label>
               </div>
          </div>
          <button title="Close (Esc)" type="button" class="btn btn-block btn-save bgbl cancelSave">
               <span class="white">Salvar</span>
          </button>
     </div>
</div>

```

O Js para abrir a modal-inline será:

```javascript
$('#modal-open').click(function () {
     $.magnificPopup.open({
          items: {
               src: '#popup-modal', // A div que contém todo o conteúdo que definimos
               type: 'inline', // Não se esqueça disso...
          }
     });
});

```