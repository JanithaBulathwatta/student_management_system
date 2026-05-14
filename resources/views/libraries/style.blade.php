<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    body{
        padding: 2px;
    }
    /* Error message එක රතු පාටින් සහ කුඩා අකුරින් පෙන්වීම */
    .invalid-feedback {
        display: block;        /* අලුත් පේළියක පෙන්වීමට */
        color: #ff0000;        /* තද රතු පාට */
        font-size: 12px;       /* අකුරු වල ප්‍රමාණය (පොඩියට) */
        margin-top: 4px;       /* Input එකේ සිට පරතරය */
        font-weight: 500;      /* අකුරු ටිකක් පැහැදිලිව පෙනෙන්න */
    }

    /* Input box එක වටේ රතු බෝඩර් එකක් එන එක එපා නම් මේක පාවිච්චි කරන්න */
    .is-invalid {
        border-color: #ced4da !important; /* සාමාන්‍ය බෝඩර් පාට (රතු වෙන්නේ නැහැ) */
    }
</style>
