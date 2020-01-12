@extends('layouts.admin')

@section('title' , 'Graduates')

@section('content')
<main class="columns is-centered is-multiline is-desktop" id="maincontainer">
    @include("templates.admin_logo")
    @if(session('user_role') == 'superadmin')
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="graduates-content">
        <div class="columns is-centered is-mobile">
            <div class="column is-12-mobile is-12-tablet is-11-desktop is-11-widescreen is-11-fullhd">
                <div class="container is-centered is-fluid" id="graduates-container">
                    <header class="table-header">
                        <div class="table-title">
                            <h2>Graduates</h2>
                        </div>
                        <div class="table-option" id="graduates-table-options">
                            <form method="post" autocomplete="off">
                                <div class="columns is-centered is-desktop">
                                    <div class="column">
                                        <div class="control">

                                            <div class="control">
                                                <div class="select is-small">
                                                    <select id="">
                                                        <option value="all">All</option>
                                                        <option value="stem">STEM</option>
                                                        <option value="artsscience">ARTS AND SCIENCE</option>
                                                        {{--
                                                        @foreach()
                                                        <option value="{{}}">{{}}</option>
                                                        @endforeach
                                                        --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="column is-12-mobile-is-12-tablet is-2-dekstop is-2-widescreen is-2-fullhd">
                                        <div class="control">
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input is-small" id="graduate-search" type="text"
                                                    placeholder="Search">
                                                <span class="icon is-small is-left">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </header>
                    <div class="table-container">
                        <table class="table is-narrow is-fullwidth is-bordered is-hoverable" id="graduates-table">
                            <thead>
                                <tr>
                                    <th class="has-text-centered">#</th>
                                    <th class="has-text-centered">LRN</th>
                                    <th class="has-text-centered">STRAND</th>
                                    <th class="has-text-centered">FIRSTNAME</th>
                                    <th class="has-text-centered">MIDDLENAME</th>
                                    <th class="has-text-centered">LASTNAME</th>
                                    <th class="has-text-centered">ADDRESS</th>
                                    <th class="has-text-centered">BIRTHDAY</th>
                                    <th class="has-text-centered">AGE</th>
                                    <th class="has-text-centered">GENDER</th>
                                    <th class="has-text-centered">CIVIL STATUS</th>
                                    <th class="has-text-centered">STATUS</th>
                                    <th class="has-text-centered">OPTION</th>
                                </tr>
                            </thead>
                            <tbody id="graduates-data">
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <footer class="table-footer" id="graduates-table-footer">
                        <div class="columns is-mobile is-multiline">
                            <div class="column is-12" id="pagination-container">
                                <nav class="pagination is-small" role="navigation" aria-label="pagination"
                                    id="graduates-pagination">
                                    <a class="pagination-previous" id="paginate-prev"
                                        title="This is the first page">Previous</a>
                                    <a class="pagination-next" id="paginate-next">Next</a>
                                    <ul class="pagination-list" id="graduates-pagination-list">
                                        <li>
                                            <a class="pagination-link is-current"
                                                style="background-color: transparent; border:1px solid transparent"
                                                aria-label="Page 1" aria-current="page">1</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    @endif
</main>
@endsection