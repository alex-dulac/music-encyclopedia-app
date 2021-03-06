import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {HttpClientModule} from "@angular/common/http";
import {AppComponent} from './app.component';
import {AppRoutingModule} from './app-routing.module';
import {SidebarComponent} from '@modules/sidebar/sidebar.component';
import {InterfaceLayoutComponent} from '@modules/interface-layout/interface-layout.component';

@NgModule({
    declarations: [
        AppComponent,
        SidebarComponent,
        InterfaceLayoutComponent
    ],
    imports: [
        BrowserModule,
        HttpClientModule,
        AppRoutingModule
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
