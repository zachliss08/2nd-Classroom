function set_localstorage( val ){
window.localStorage.setItem('username', val);
console.log( localStorage.getItem( 'username' ) );
}
