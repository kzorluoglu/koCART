<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Category extends KoController
{
    public function seolink()
    {

            //Products...
        $id = $this->security->xss_clean($this->uri->segment(2));

        foreach ($this->products_model->category_products($id) as $category_products) {
            $category_product[] = array(
                   'id'  			=> $category_products->id,
                   'name'			=> $category_products->name,
                   'details'		=> $category_products->details,
                   'product_id'		=> $category_products->product_id,
                   'rank'			=> $category_products->rank,
                   'category_id'	=> $category_products->category_id,
                   'price'			=> ''.$this->cart->format_number($category_products->price * $this->data['currency_currency']),
                   'stock'			=> $category_products->stock,
                   'image'			=> $category_products->image,
                   'url'			=> $category_products->url,
                   'description_id'	=> $category_products->description_id,
                   'language_id'	=> $category_products->language_id,
                   'meta_tags'		=> $category_products->meta_tags,
                   'meta_keys'		=> $category_products->meta_keys
                   );
        }

        @$this->data['category_products'] = $category_product;

        foreach ($this->products_model->slider_products() as $slider_products) {
            $slider_product[] = array(
                   'id'  			=> $slider_products->id,
                   'name'			=> $slider_products->name,
                   'details'		=> $slider_products->details,
                   'type'			=> $slider_products->type,
                   'product_id'		=> $slider_products->product_id,
                   'rank'			=> $slider_products->rank,
                   'category_id'	=> $slider_products->category_id,
                   'price'			=> ''.$this->cart->format_number($slider_products->price * $this->data['currency_currency']),
                   'stock'			=> $slider_products->stock,
                   'image'			=> $slider_products->image,
                   'url'			=> $slider_products->url,
                   'description_id'	=> $slider_products->description_id,
                   'language_id'	=> $slider_products->language_id,
                   'meta_tags'		=> $slider_products->meta_tags,
                   'meta_keys'		=> $slider_products->meta_keys
               );
        }

        $this->data['slider_products'] = $slider_product;

        //Menu...
        $this->data['categories'] = $this->categories_model->get_cats();

        $this->load->view('category', $this->data);
    }
}
