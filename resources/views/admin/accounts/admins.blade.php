@extends('layouts.admin')

@section('title' , 'Admin Accounts')

@section('content')
<main class="columns is-centered is-multiline is-desktop" id="maincontainer">
    @include("templates.admin_logo")
    <div class="column is-12-mobile is-12-tablet is-12-desktop is-12-widescreen is-12-fullhd" id="admins-content">
        <div class="columns is-centered is-mobile">
            <div class="column is-12-mobile is-12-tablet is-11-desktop is-11-widescreen is-11-fullhd">
                <div class="container is-centered is-fluid" id="admins-container">
                    <header class="table-header">
                        <div class="table-title">
                            <h>Admin Accounts list</h2>
                        </div>
                        <div class="table-option" id="admins-table-options">
                            <form id="admins-form" autocomplete="off">
                                <div class="columns is-desktop">
                                    <div class="column is-1-desktop" id="add-admins">
                                        <div class="columns is-desktop">
                                            <div class="column">
                                                <button class="button is-link is-small" id="admins-add-button">New
                                                    Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="column is-12-mobile-is-12-tablet is-2-desktop is-2-widescreen is-2-fullhd">
                                        <div class="control">
                                            <div class="control has-icons-left has-icons-right">
                                                <input class="input is-small" id="admins-search" type="text"
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
                        <table class="table is-narrow is-fullwidth is-bordered is-hoverable" id="admins-table">
                            <thead>
                                <tr>
                                    <th class="has-text-centered">#</th>
                                    <th class="has-text-centered">USERNAME</th>
                                    <th class="has-text-centered">EMAIL</th>
                                    <th class="has-text-centered">PHONE</th>
                                    <th class="has-text-centered" colspan="3">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="admins-data">
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td>*</td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                    <td><a class="button is-small"
                                            style="border:1px solid transparent; color:transparent;cursor:auto;background-color:transparent;">*</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <footer class="table-footer" id="admins-table-footer">
                        <div class="column is-12" id="pagination-container">
                            <nav class="pagination is-small" role="navigation" aria-label="pagination"
                                id="admins-pagination">
                                <a class="pagination-previous" id="paginate-prev"
                                    title="This is the first page">Previous</a>
                                <a class="pagination-next" id="paginate-next">Next</a>
                                <ul class="pagination-list" id="admins-pagination-list">
                                    <li>
                                        <a class="pagination-link is-current"
                                            style="background-color: transparent; border:1px solid transparent"
                                            aria-label="Page 1" aria-current="page">1</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection